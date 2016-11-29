<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductEdit;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        $tags = Tag::all();

        return view('admin.product.create', compact('product', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->all());
        $product->fillIn($request->all());

        return back()->with('status', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $tagNames = $product->tags->pluck('name');

        return view('admin.product.show', compact('product', 'tagNames'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::get(['id', 'name']);
        $tags = Tag::all();

        return view('admin.product.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductEditRequest $request
     * @param Product $product
     * @return array
     */
    public function update(ProductEditRequest $request, Product $product)
    {
        $product->fillIn($request->all());

        return back()->with('status', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return string
     */
    public function destroy(Product $product)
    {
        $product->deleteProduct();

        return back()->with('status', 'Successfully deleted');
    }
}
