<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductStateDetail;
use App\Purchase;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:reports.purchases')->only(['reports_purchases']);
        $this->middleware('can:reports.sales')->only(['reports_sales']);
        $this->middleware('can:reports.productstates')->only(['reports_productstates']);
    }

    public function reports_purchases(){
        $user_session = Auth::user()->email;
        $purchases = Purchase::WhereDate('purc_date', Carbon::today('America/Lima'))->get();
        $purchases_actives = Purchase::WhereDate('purc_date', Carbon::today('America/Lima'))->where('purc_status', 'VALID')->get();
        $total = $purchases_actives->sum('purc_total');
        return view('admin.report.reports_purchases', compact('purchases', 'total','purchases_actives', 'user_session'));
    }

    public function reports_purchases_results(Request $request)
    {
        $user_session = Auth::user()->email;
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        
        $purchases = Purchase::WhereBetween('purc_date', [$fi, $ff])->get();
        $purchases_actives = Purchase::WhereBetween('purc_date',[$fi, $ff])->where('purc_status', 'VALID')->get();
        $total = $purchases_actives->sum('purc_total');
        return view('admin.report.reports_purchases', compact('purchases', 'total','purchases_actives','user_session'));
    }

    public function reports_sales()
    {
        $user_session = Auth::user()->email;
        $sales = Sale::WhereDate('sale_date', Carbon::today('America/Lima'))->get();
        $sales_actives = Sale::WhereDate('sale_date', Carbon::today('America/Lima'))->where('sale_status', 'VALID')->get();
        $total = $sales_actives->sum('sale_total');
        return view('admin.report.reports_sales', compact('sales','total','sales_actives','user_session'));
    }
    public function reports_sales_results(Request $request)
    {
        $user_session = Auth::user()->email;
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';

        $sales = Sale::WhereBetween('sale_date', [$fi, $ff])->get();
        $sales_actives = Sale::WhereBetween('sale_date',[$fi, $ff])->where('sale_status', 'VALID')->get();
        $total = $sales_actives->sum('sale_total');
        return view('admin.report.reports_sales', compact('sales','total','sales_actives','user_session'));
    }
    
    public function reports_productstates()
    {
        $products = Product::get();
        $fecha_actual = Carbon::now('America/Lima')->toDateString();

        foreach ($products as $product) {
            if ($product->prod_expiration != null && $product->prod_expiration == $fecha_actual &&  $product->prod_stock>0) {

                ProductStateDetail::create(['prod_stat_deta_date'=>$fecha_actual,
                'product_id'=>$product->id,'product_state_id'=>1,
                'prod_stat_deta_cantidad'=>$product->prod_stock,
                ]);

                $product->update(['prod_stock' => 0,]);
            }
        }

        $user_session = Auth::user()->email;
        $productstates = DB::select('SELECT p.prod_name as product,p.prod_stock as stock,sum(psd.prod_stat_deta_cantidad) as cantidad,sum(psd.prod_stat_deta_cantidad)+p.prod_stock as subtotal FROM `product_state_details` as psd INNER JOIN products as p ON psd.product_id=p.id WHERE MONTH(psd.prod_stat_deta_date)= MONTH(curdate()) GROUP BY product,stock order by cantidad desc');
        $totales = DB::select('SELECT SUM(`prod_stat_deta_cantidad`) AS total FROM `product_state_details` WHERE MONTH(`prod_stat_deta_date`)= MONTH(curdate())');
        return view('admin.report.reports_productstatestotal', compact('productstates', 'totales', 'user_session'));
    }

    public function reports_productexpired()
    {
        $user_session = Auth::user()->email;
        $productstates = ProductStateDetail::WhereYear('prod_stat_deta_date', Carbon::today('America/Lima')->format('Y'))->WhereMonth('prod_stat_deta_date', Carbon::today('America/Lima')->format('m'))->where('product_state_id', '1')->get();
        $total = $productstates->sum('prod_stat_deta_cantidad');
        $state = "Vencidos";
        $state1 = "Dañados";
        $state2 = "Obsoletos";
        $state1url = "reports.productimperfect";
        $state2url = "reports.productobsolete";
        return view('admin.report.reports_productstates', compact('state', 'productstates', 'total', 'state1', 'state2', 'state1url', 'state2url', 'user_session'));
    }
    public function reports_productimperfect()
    {
        $user_session = Auth::user()->email;
        $productstates = ProductStateDetail::WhereYear('prod_stat_deta_date', Carbon::today('America/Lima')->format('Y'))->WhereMonth('prod_stat_deta_date', Carbon::today('America/Lima')->format('m'))->where('product_state_id', '2')->get();
        $total = $productstates->sum('prod_stat_deta_cantidad');
        $state = "Dañados";
        $state1 = "Obsoletos";
        $state2 = "Vencidos";
        $state1url = "reports.productobsolete";
        $state2url = "reports.productexpired";
        return view('admin.report.reports_productstates', compact('state', 'productstates', 'total', 'state1', 'state2', 'state1url', 'state2url', 'user_session'));
    }
    public function reports_productobsolete()
    {
        $user_session = Auth::user()->email;
        $productstates = ProductStateDetail::WhereYear('prod_stat_deta_date', Carbon::today('America/Lima')->format('Y'))->WhereMonth('prod_stat_deta_date', Carbon::today('America/Lima')->format('m'))->where('product_state_id', '3')->get();
        $total = $productstates->sum('prod_stat_deta_cantidad');
        $state = "Obsoletos";
        $state1 = "Vencidos";
        $state2 = "Dañados";
        $state1url = "reports.productexpired";
        $state2url = "reports.productimperfect";
        return view('admin.report.reports_productstates', compact('state', 'productstates', 'total', 'state1', 'state2', 'state1url', 'state2url', 'user_session'));
    }

    public function reports_productstates_results(Request $request)
    {
        // dd($request);
        $fi = $request->fecha_ini;
        $ff = $request->fecha_fin;
        $user_session = Auth::user()->email;

        if ($request->state == "Vencidos") {
            $productstates = ProductStateDetail::WhereBetween('prod_stat_deta_date', [$fi, $ff])->where('product_state_id', '1')->get();
            $state = "Vencidos";
            $state1 = "Dañados";
            $state2 = "Obsoletos";
            $state1url = "reports.productimperfect";
            $state2url = "reports.productobsolete";
        }
        if ($request->state == "Dañados") {
            $productstates = ProductStateDetail::WhereBetween('prod_stat_deta_date', [$fi, $ff])->where('product_state_id', '2')->get();
            $state = "Dañados";
            $state1 = "Obsoletos";
            $state2 = "Vencidos";
            $state1url = "reports.productobsolete";
            $state2url = "reports.productexpired";
        }
        if ($request->state == "Obsoletos") {
            $productstates = ProductStateDetail::WhereBetween('prod_stat_deta_date', [$fi, $ff])->where('product_state_id', '3')->get();
            $state = "Obsoletos";
            $state1 = "Vencidos";
            $state2 = "Dañados";
            $state1url = "reports.productexpired";
            $state2url = "reports.productimperfect";
        }

        $total = $productstates->sum('prod_stat_deta_cantidad');
        return view('admin.report.reports_productstates', compact('state', 'productstates', 'total', 'state1', 'state2', 'state1url', 'state2url', 'user_session'));
    }
}
