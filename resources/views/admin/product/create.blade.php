@extends('layouts.admin.master')

@section('content')
    <div class="container">
        <div class="row">

            <h2>Create a New Product</h2>

            <form action="{{action('Admin\ProductController@store')}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select name="category_id" class="form-control">
                        <option >Select Category...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="10" name="description">{{old('description')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" name="image[]" multiple>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" value="{{old('price')}}">
                </div>

                <div class="form-group">
                    <label for="product_details">Product Details:</label>
                    <textarea class="form-control" rows="5" name="product_details">{{old('product_details')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Tags:</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{$tag->id}}" name="tags[]" id="tags"
                                {{is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'checked' : ''}}>
                                {{$tag->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary pull-right">Create</button>

            </form>
        </div>
    </div>

@stop