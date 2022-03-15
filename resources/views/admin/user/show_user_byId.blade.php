@extends('admin.layouts.master')

@section('title','User show by id')

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Users Details Info </h2>
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$users->name}}</td>

                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>{{$users->city==null?'None':$users->city}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$users->email}}</td>

                                        </tr>
                                        <tr>
                                            <th>User Type</th>
                                            <td>{{$users->user_type==1?'Admin':'User'}}</td>

                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{$users->status}}</td>

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