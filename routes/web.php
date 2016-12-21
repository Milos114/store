<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;



Route::get('get-product/{product}', function (Product $product) {
    Redis::zincrby('trending_products', 1, $product->id);

    return $product;
});

Route::get('trending-products', function () {
   $trendingProducts = Redis::zrevrange('trending_products', 0, -1);

//    $trendingProducts = Product::hydrate(
//        array_map('json_decode', $trendingProducts)
//    );
//    dd($trendingProducts);

    $models = array_map(function($productId) {
        return Product::find($productId);
    }, $trendingProducts);
    dd($models);
});

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/product', 'ProductController@index');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('home', 'AdminController@index');
    Route::get('admin/job-approve/{id}', 'AdminController@approve');

    // DataTables
    Route::get('dataTablesProducts', 'Admin\DataTableController@getProducts');

    // Products
    Route::get('products', 'Admin\ProductController@index');
    Route::get('product/create', 'Admin\ProductController@create');
    Route::post('products', 'Admin\ProductController@store');
    Route::get('product/{product}/edit', 'Admin\ProductController@edit');
    Route::post('product/{product}', 'Admin\ProductController@update');
    Route::get('product/{product}', 'Admin\ProductController@show');
    Route::get('product/{product}/delete', 'Admin\ProductController@destroy');

    Route::post('product-image-upload/{product}', 'Admin\ProductController@productImage');
    Route::post('delete-product-image/{product}', 'Admin\ProductController@deleteImage');

    Route::get('hashes', function () {
        return Product::all();

        $id = Auth::id();
        $userStats = [
            'favourites' => 10,
            'watchlaters' => 20,
            'completions' => 30,
        ];

        Redis::hmset("user.$id.stats", $userStats);
        Redis::hincrby("user.$id.stats", 'favourites', 23);
        return Redis::hgetall("user.$id.stats");
    });
    Route::get('caching', function () {
        $products = Cache::remember('products.all', 1, function () {
            return Product::all();
        });

        return $products;
//        return remember('products.all', 60, function () {
//            return Product::all();
//        });
    });

    function remember($key, $minutes, Closure $callback) {
        if ($value = Redis::get($key)) {
            return json_decode($value);
        }

        Redis::setex($key, $minutes, $value = $callback());

        return $value;

    }
});
