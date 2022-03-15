@extends('admin.layouts.master')

@section('title','View Single Products page')

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">View  Details Products Info </h2>
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tbody>
                                <tr>
                                    <th>Product Name</th>
                                    <td>{{$products->name}}</td>

                                </tr>
                                <tr>
                                    <th>Category Name</th>
                                    <td>{{$products->category_id==1?'Woman':'Man'}}</td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td>{{$products->size}}</td>

                                </tr>
                                <tr>
                                    <th>Product Color</th>
                                    <td>{{$products->color}}</td>

                                </tr>
                                <tr>
                                    <th>Product Price</th>
                                    <td>{{$products->price}}</td>

                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{$products->status==1?'publish':'unpublish'}}</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection