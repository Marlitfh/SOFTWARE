<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductState;
use App\ProductStateDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductStateDetailController extends Controller
{
    public function index()
    {
        $user_session = Auth::user()->email;
        $productstates=ProductStateDetail::get();
        $total = $productstates->sum('prod_stat_deta_cantidad');
        // $products = Product::Where('prod_stock', '>', '0')->where('prod_expiration', '!=','null')->get();
        $products = Product::Where('prod_stock', '>', '0')->get();
        $states = ProductState::get();
        return view('admin.product.states', compact('productstates', 'total', 'products','states', 'user_session'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductStateDetail::create($request->all() + [
            "prod_stat_deta_date" => Carbon::now('America/Lima'),
            ]);
        
        $cantidad= $request->prod_stat_deta_cantidad;
        
        $product = Product::where('id', $request->product_id)->first();
        $product->update(['prod_stock' => $product->prod_stock - $cantidad]);

        return redirect()->route('productstatedetails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductStateDetail  $productStateDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductStateDetail $productStateDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductStateDetail  $productStateDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductStateDetail $productStateDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductStateDetail  $productStateDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductStateDetail $productStateDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductStateDetail  $productStateDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductStateDetail $productStateDetail)
    {
        //
    }
}
