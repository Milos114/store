@extends('layouts.admin.master')

@section('content')
    <div class="container">
        <div class="row">

            <h2>Edit Product: <i>{{$product->title}}</i></h2>

            <form action="{{action('Admin\ProductController@update', $product->id)}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$product->title}}">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="10" name="description">{{$product->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" name="image[]" multiple>
                </div>

                <div class="form-group">
                    <label for="image">Price:</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label for="product_details">Product Details:</label>
                    <textarea class="form-control" rows="5" name="product_details">{{$product->product_details}}</textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Tags:</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{$tag->id}}" name="tags[]" id="tags" {{$product->tags->contains($tag) ? 'checked' : ''}}>
                                {{$tag->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary pull-right">Save</button>

            </form>
        </div>
    </div>

@stop