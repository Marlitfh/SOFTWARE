<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\Sale\StoreRequest;
use App\Product;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth');
        $this->middleware('can:sales.create')->only(['create', 'store']);
        $this->middleware('can:sales.index')->only(['index']);
        $this->middleware('can:sales.show')->only(['show']);
        $this->middleware('can:change.status.sales')->only(['change_status']);
        $this->middleware('can:sales.pdf')->only(['pdf']);
        $this->middleware('can:sales.print')->only(['print']);
    }

    public function index()
    {
        $user_session = Auth::user()->email;
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales', 'user_session'));
    }

    public function create()
    {
        $user_session = Auth::user()->email;
        $clients = Client::get();
        $products = Product::WhereDate('prod_expiration','>',Carbon::today('America/Lima'))->orWhere('prod_expiration', Null)->get();
        // $products = Product::get();
        return view('admin.sale.create', compact('clients', 'products', 'user_session'));
    }

    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all() + [
            'user_id' => Auth::user()->id,
            'sale_date' => Carbon::now('America/Lima'),
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array(
                "product_id" => $request->product_id[$key],
                "sade_quantity" => $request->sade_quantity[$key],
                "sade_price" => $request->sade_price[$key],
                "sade_discount" => $request->sade_discount[$key]
            );
        }

        $sale->saleDetails()->createMany($results);
        return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        $user_session = Auth::user()->email;

        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->sade_quantity * $saleDetail->sade_price - $saleDetail->sade_quantity * $saleDetail->sade_price * $saleDetail->sade_discount / 100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal', 'user_session'));
    }

    public function edit(Sale $sale)
    {
        //
    }

    public function update(Request $request, Sale $sale)
    {
        //
    }

    public function destroy(Sale $sale)
    {
        //
    }

    public function change_status(Sale $sale)
    {
        if ($sale->sale_status == "VALID") {
            $sale->update(['sale_status' => "CANCELED"]);
            return redirect()->back();
        } else {
            $sale->update(['sale_status' => "VALID"]);
            return redirect()->back();
        }
    }

    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->sade_quantity * $saleDetail->sade_price - $saleDetail->sade_quantity * $saleDetail->sade_price * $saleDetail->sade_discount / 100;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_' . $sale->id . '.pdf');
    }

    public function print(Sale $sale)
    {
        try {
            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
            }

            $nombreImpresora = "Impresora HP";
            $connector = new WindowsPrintConnector($nombreImpresora);
            $impresora = new Printer($connector);
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->setTextSize(2, 2);
            $impresora->text("Imprimiendo\n");
            $impresora->text("ticket\n");
            $impresora->text("desde\n");
            $impresora->text("Laravel\n");
            $impresora->setTextSize(1, 1);
            $impresora->text("https://parzibyte.me");
            $impresora->feed(5);
            $impresora->close();

            // $printer_name = "Impresora HP";
            // $connector = new WindowsPrintConnector($printer_name);
            // $printer = new Printer($connector);
            // $printer->text("$10.80\n");;
            // $printer->cut();
            // $printer->close();

            // return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
            // error en impresión o impresora no conectada
        }
    }
}
