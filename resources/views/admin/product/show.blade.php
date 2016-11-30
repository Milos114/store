@extends('layouts.admin.master')

@section('content')
    <div class="" style="margin: 20px">
        <div class="row">

            <h2>Show the Product</h2>

            <table class="table table-striped">
                <tbody>
                <tr class="">
                    <td>Category:</td>
                    <td>{{$product->category->name}}</td>
                </tr>

                <tr class="">
                    <td>Title:</td>
                    <td>{{$product->title}}</td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>{{$product->description}}</td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>{{$product->price}}$</td>
                </tr>

                <tr>
                    <td>Product Details:</td>
                    <td>{{$product->product_details}}</td>
                </tr>

                <tr>
                    <td>Created:</td>
                    <td>{{$product->created_at->toDayDateTimeString()}}</td>
                </tr>

                <tr>
                    <td>Updated:</td>
                    <td>{{$product->updated_at->toDayDateTimeString()}}</td>
                </tr>

                <tr>
                    <td>Tags:</td>
                    <td>
                        @foreach($tagNames as $tagName)
                            {{$loop->last ? $tagName : $tagName . ','}}
                        @endforeach
                    </td>
                </tr>

                </tbody>
            </table>
            <div class="btn-group pull-right">
                <a href="{{action('Admin\ProductController@edit', [$product->id])}}">
                    <button type="button" class="btn btn-primary">Edit this product</button>
                </a>
            </div>

            <div class="btn-group pull-left">
                <a href="{{action('Admin\ProductController@index')}}">
                    <button type="button" class="btn btn-block">Back to products</button>
                </a>
            </div>
        </div>
    </div>

    <form action="{{action('Admin\ProductController@productImage', [$product->id])}}"
          class="dropzone"
          id="my-awesome-dropzone">
        {{csrf_field()}}
    </form>

    @foreach($images as $image)
        <img src="{{asset('storage/' . $product->id . '/' . $image)}}" class="show-image" style="width: 200px">
        <a href="/delete/{{$image}}">Delete</a>
    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@stop