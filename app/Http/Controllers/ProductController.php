<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Product;
use App\ProductStateDetail;
use App\PurchaseDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:products.create')->only(['create', 'store']);
        $this->middleware('can:products.index')->only(['index']);
        $this->middleware('can:products.edit')->only(['edit', 'update']);
        $this->middleware('can:products.show')->only(['show']);
        $this->middleware('can:products.destroy')->only(['destroy']);
        $this->middleware('can:change.status.products')->only(['change_status']);
    }

    public function index()
    {
        $products = Product::get();
        $user_session = Auth::user()->email;
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

        return view('admin.product.index', compact('products', 'user_session', 'fecha_actual'));
    }

    public function create()
    {
        $categories = Category::get();
        $user_session = Auth::user()->email;
        return view('admin.product.create', compact('categories', 'user_session'));
    }

    public function store(StoreRequest $request)
    {
        // $year_= Carbon::now('America/Lima')->format('Y');
        // $year_=$year_+5;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);

            $product = Product::create($request->all() + ['prod_image' => $image_name,]);
        } else {
            $product = Product::create($request->all());
            // $product = Product::create($request->all()+['prod_expiration'=>$year_.'-01-01',]);
        }

        if ($request->code == "") {
            $id = $product->id;
            $can_digitos = 8;
            $bar_code = str_pad($id, $can_digitos, "0", STR_PAD_LEFT);
            $product->update(['prod_code' => $bar_code]);
        }

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        $categories = Category::get();
        $user_session = Auth::user()->email;
        $fecha_actual = Carbon::now('America/Lima')->toDateString();
        return view('admin.product.show', compact('product', 'categories', 'user_session', 'fecha_actual'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $user_session = Auth::user()->email;
        return view('admin.product.edit', compact('product', 'categories', 'user_session'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $product->update($request->all() + ['prod_image' => $image_name,]);
        } else {
            $product->update($request->all());
        }

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            $errors = 'Registro relacionado, imposible de eliminar';
            return redirect()->route('products.index')->with('errors', $errors);
        }
    }

    public function change_status(Product $product)
    {
        // if ($product->prod_status == "ACTIVE") {
        //     $product->update(['prod_status' => "DEACTIVATED"]);
        //     return redirect()->back();
        // } else {
        //     $product->update(['prod_status' => "ACTIVE"]);
        //     return redirect()->back();
        // }
    }

    public function get_products_by_barcode(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('prod_code', $request->code)->first();
            return response()->json($products);
        } //firstOrFail()
    }

    public function get_products_by_id(Request $request)
    {
        if ($request->ajax()) {
            // $products = Product::where('id', $request->product_id)->first();
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }
}
