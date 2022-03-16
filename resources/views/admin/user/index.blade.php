@if(Auth::user()->user_type==1)
@extends('admin.layouts.master')
@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if($message = Session::get('message'))
                        <h4 class="text-center text-success fw-bolder mb-4">{{ $message }}</h4>
                    @endif
                    <div class="card shadow border-dark">
                        <div class="card-header bg-dark">
                            <h3 class="text-center  text-white">Manage User</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center text-warning fs-5">SN</th>
                                    <th class="text-center text-warning fs-5"> Name</th>
                                    <th class="text-center text-warning fs-5"> Email</th>
                                    <th class="text-center text-warning fs-5"> Status</th>
                                    <th class="text-center text-warning fs-5">Take Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-dark">{{ $user->name }}</td>
                                        <td class="text-dark">{{ $user->email }}</td>
                                        <td class="text-dark">{{ $user->status }}</td>


                                        <td class="text-center">
                                            @if($user->user_type=='1')
                                              <p>super admin</p>

                                                @else
                                                <a href="{{route('user.show',$user->id)}}" class="btn btn-primary btn-sm fw-bold">view</a>
                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-success btn-sm fw-bold">Edit</a>
                                                <a href="" data-id="{{ $user->id }}" class="btn btn-danger btn-sm fw-bold delete">Delete</a>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form action="{{route('user.destroy','@')}}" method="post" id="delete_form">
        @csrf
        @method('delete')
    </form>
@endsection
@endif

@section('script')
    <script>
        const delete_form = $('#delete_form');
        $('.delete').click(function(event){
            event.preventDefault();
            const id = $(this).data('id');
            if (confirm('Are you sure ?')) {
                delete_form.attr('action', delete_form.attr('action').replace('@', id))
                delete_form.submit();
            }
        })
    </script>
@endsection