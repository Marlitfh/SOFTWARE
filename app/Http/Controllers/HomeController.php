<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_session= Auth::user()->email;
        $totalcompra = DB::select('SELECT ifnull(sum(c.purc_total), 0) as totalcompra from purchases c WHERE YEAR(c.purc_date)= YEAR(CURRENT_DATE) AND MONTH(c.purc_date)= MONTH(CURRENT_DATE) AND c.purc_status="VALID" ');
        $totalventa = DB::select('SELECT ifnull(sum(v.sale_total), 0) as totalventa from sales v WHERE YEAR(v.sale_date)= YEAR(CURRENT_DATE) AND MONTH(v.sale_date)= MONTH(CURRENT_DATE) AND v.sale_status="VALID"');
        $comprasmes = DB::select('SELECT monthname(c.purc_date) as mes, sum(c.purc_total) as totalmes from purchases c WHERE c.purc_status="VALID" group by mes ORDER BY mes limit 12');
        $ventasmes = DB::select('SELECT monthname(v.sale_date) as mes, sum(v.sale_total) as totalmes from sales v WHERE v.sale_status="VALID" group by mes ORDER BY mes limit 12');
        $ventasdia = DB::select('SELECT DATE_FORMAT(v.sale_date, "%d/%m/%Y") as dia, sum(v.sale_total) as totaldia from sales v WHERE v.sale_status="VALID" AND MONTH(v.sale_date)=MONTH(CURRENT_DATE) group by dia ORDER BY dia');
        $productosvendidos = DB::select('SELECT p.prod_code as code, sum(dv.sade_quantity) as quantity, p.prod_name as name, p.id as id, p.prod_stock as stock from products p inner join sale_details dv on p.id=dv.product_id inner join sales v on dv.sale_id = v.id WHERE v.sale_status="VALID" and YEAR(v.sale_date)= YEAR(curdate()) AND MONTH(v.sale_date)= MONTH(curdate()) GROUP BY code, name, id, stock order by sum(dv.sade_quantity) desc limit 10');
        return view('home', compact('comprasmes', 'ventasmes', 'ventasdia', 'totalcompra', 'totalventa', 'productosvendidos', 'user_session'));
    }
}
