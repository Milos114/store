<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class DataTableController extends Controller
{
    public function getProducts()
    {
        $products = Product::select(['id', 'title', 'price', 'created_at']);

        return Datatables::of($products)
            ->editColumn('created_at', function ($product) {
                return (new Carbon($product->created_at))->toDayDateTimeString() . ' <small style=color:#41516b>' . $product->created_at->diffForHumans() . '</small>';
            })->addColumn('show', function ($product) {
                return '<a href="/admin/product/' . $product->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-picture"></i> Show</a>';
            })
            ->addColumn('edit', function ($product) {
                return '<a href="/admin/product/' . $product->id . '/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->addColumn('delete', function ($product) {
                return '<a href="/admin/product/' . $product->id . '/delete" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->make(true);
    }
}
