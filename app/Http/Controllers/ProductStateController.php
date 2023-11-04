<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductState;
use App\ProductStateDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductStateController extends Controller
{
    
    public function index()
    {
        
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function show(ProductState $productState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductState $productState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductState $productState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductState $productState)
    {
        //
    }
}
