<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class DataTableController extends Controller
{
    public function getProducts()
    {
        $products = Product::select(['id', 'title', 'price', 'created_at']);

        return Datatables::of($products)
            ->addColumn('edit', function ($product) {
                return '<a href="/admin/product/' . $product->id . '/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->addColumn('delete', function ($product) {
                return '<a href="/admin/product/' . $product->id . '/delete" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-delete"></i> Delete</a>';
            })
            ->make(true);
    }
}
