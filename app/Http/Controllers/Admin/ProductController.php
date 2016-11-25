<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductEdit;
use App\Http\Requests\ProductEditRequest;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
//        $product = Product::with('category', 'tags')
//            ->where('id', $product->id)
//            ->first();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return 'fdsf';
    }
}
