@extends('layouts.admin.master')

@section('content')
    {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
            {{--<h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><i class="fa fa-home"></i><a href="#">Home</a></li>--}}
                {{--<li><i class="fa fa-bars"></i>Pages</li>--}}
                {{--<li><i class="fa fa-square-o"></i>Pages</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}

        <div class="content">
            <div class="btn-group pull-right">
                <a href="{{action('Admin\ProductController@create')}}">
                    <button type="button" class="btn btn-success">Add new product</button>
                </a>
            </div>
            <h3>Products</h3>

            <table id="products-table" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th class="col-md-3">Title</th>
                    <th class="col-md-3">Price</th>
                    <th class="col-md-3">Created At</th>
                    <th class="col-md-3">Show</th>
                    <th class="col-md-3">Edit</th>
                    <th class="col-md-3">Delete</th>
                </tr>
                </thead>
            </table>
        </div>

    <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script>
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/dataTablesProducts',
            columns: [
                {data: 'title', name: 'title'},
                {data: 'price', name: 'price'},
                {data: 'created_at', name: 'created_at'},
                {data: 'show', name: 'show', orderable: false, searchable: false},
                {data: 'edit', name: 'edit', orderable: false, searchable: false},
                {data: 'delete', name: 'delete', orderable: false, searchable: false}
            ]
        });
    </script>
@stop