@extends('admin.layouts.master')
@section('title','user edit form')

@section('content')
  <div class="row justify-content-center py-5">
      <div class="col-md-6">
          <div class="ibox">
              <div class="ibox-head">
                  <div class="ibox-title ">User Edit Form</div>
                  <div class="ibox-tools">
                      <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                      <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                  </div>
              </div>
              <div class="ibox-body">
                  <form action="{{route('user.update',$users->id)}}" method="post"  class="form-horizontal">
                      @csrf
                    @method('put')
                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                              <input class="form-control" name="name" type="text" value="{{$users->name}}">
                          </div>
                      </div>

                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label">City</label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="city" type="text" value="{{$users->city}}">
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-sm-10 ml-sm-auto">
                                  <button class="btn btn-block btn-info" type="submit">Update</button>
                              </div>
                          </div>
                      </form>
              </div>
          </div>
      </div>
  </div>

  </div>

@endsection