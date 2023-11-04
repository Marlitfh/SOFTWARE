<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:categories.create')->only(['create', 'store']);
        $this->middleware('can:categories.index')->only(['index']);
        $this->middleware('can:categories.edit')->only(['edit', 'update']);
        $this->middleware('can:categories.show')->only(['show']);
        $this->middleware('can:categories.destroy')->only(['destroy']);
    }

    public function index()
    {
        $user_session = Auth::user()->email;
        $categories = Category::get();
        return view('admin.category.index', compact('categories','user_session'));
    }

    public function create()
    {
        $user_session = Auth::user()->email;
        return view('admin.category.create', compact('user_session'));
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        $user_session = Auth::user()->email;
        return view('admin.category.show', compact('category', 'user_session'));
    }

    public function edit(Category $category)
    {
        $user_session = Auth::user()->email;
        return view('admin.category.edit', compact('category', 'user_session'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            $errors = 'Registro relacionado, imposible de eliminar';
            return redirect()->route('categories.index')->with('errors', $errors);
        }
    }
}
