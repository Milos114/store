@extends('layouts.admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <form enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$categoryForProduct == $category ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" value="{{$product->title}}">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="10" id="description">{{$product->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image">
                </div>

                <div class="form-group">
                    <label for="image">Price:</label>
                    <input type="text" class="form-control" id="price" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label for="details">Product Details:</label>
                    <textarea class="form-control" rows="5" id="details">{{$product->product_details}}</textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Tags:</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{$tag->id}}" name="tags[]" id="tags">
                                {{$tag->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

                {{--<div class="form-group">--}}
                    {{--@foreach($tags as $tag)--}}
                        {{--<div>--}}
                            {{--{{$tag->name}}<input type="checkbox" class="form-control" value="{{$tag->id}}">--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}

                <button type="submit" class="btn btn-primary pull-right">Save</button>
            </form>
        </div>
    </div>

@stop