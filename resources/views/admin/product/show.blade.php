@extends('layouts.admin.master')

@section('content')
    <div class="">
        <div class="">

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
        </div>
    </div>

@stop