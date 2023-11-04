<?php

namespace App\Http\Controllers;

use App\Http\Requests\Purchase\StoreRequest;
use App\Product;
use App\Provider;
use App\Purchase;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth');
        $this->middleware('can:purchases.create')->only(['create', 'store']);
        $this->middleware('can:purchases.index')->only(['index']);
        $this->middleware('can:purchases.show')->only(['show']);
        $this->middleware('can:change.status.purchases')->only(['change_status']);
        $this->middleware('can:purchases.pdf')->only(['pdf']);
        $this->middleware('can:upload.purchases')->only(['upload']);
    }

    public function index()
    {
        $purchases = Purchase::get();
        $user_session = Auth::user()->email;
        return view('admin.purchase.index', compact('purchases', 'user_session'));
    }

    public function create()
    {
        $providers = Provider::get();
        // $products = Product::where('prod_status', 'ACTIVE')->get();
        $products = Product::whereDate('prod_expiration', '>', Carbon::now('America/Lima'))->orWhere('prod_expiration', Null)->get();
        // $products = Product::get();
        $user_session = Auth::user()->email;
        return view('admin.purchase.create', compact('providers', 'products', 'user_session'));
    }

    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all() + [
            'user_id' => Auth::user()->id,
            'purc_date' => Carbon::now('America/Lima'),
        ]);

        foreach ($request->product_id as $key => $producto) {
            $results[] = array("product_id" => $request->product_id[$key], "pude_quantity" => $request->pude_quantity[$key], "pude_price" => $request->pude_price[$key]);
        }

        $purchase->purchaseDetails()->createMany($results);
        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        $user_session = Auth::user()->email;
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->pude_quantity * $purchaseDetail->pude_price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal', 'user_session'));
    }

    public function edit(Purchase $purchase)
    {
        //
    }

    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    public function destroy(Purchase $purchase)
    {
        //
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->purc_status == "VALID") {
            $purchase->update(['purc_status' => "CANCELED"]);
            return redirect()->back();
        } else {
            $purchase->update(['purc_status' => "VALID"]);
            return redirect()->back();
        }
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->pude_quantity * $purchaseDetail->pude_price;
        }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_' . $purchase->id . '.pdf');
    }
}
