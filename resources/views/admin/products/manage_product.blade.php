@extends('admin.layouts.master')

@section('title','All Products page')



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
                            <h3 class="text-center  text-white">Manage Products</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover mb-0" id="productTable" >
                                <thead>
                                <tr>

                                    <th class="text-center text-warning fs-5"> Sl</th>
                                    <th class="text-center text-warning fs-5"> Name</th>
                                    <th class="text-center text-warning fs-5"> Category Name</th>
                                    <th class="text-center text-warning fs-5">Color</th>
                                    <th class="text-center text-warning fs-5">Size</th>
                                    <th class="text-center text-warning fs-5">Price</th>
                                    <th class="text-center text-warning fs-5">Status</th>
                                    <th class="text-center text-warning fs-5">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-dark">{{ $product->name }}</td>
                                        <td class="text-dark">{{ $product->category_id==1?'Woman':'Man' }}</td>
                                        <td class="text-dark">{{ $product->color }}</td>
                                        <td class="text-dark">{{ $product->size }}</td>
                                        <td class="text-dark">{{ $product->price }}</td>
                                        <td class="text-dark">{{ $product->status==1?'Publish':'Unpublish' }}</td>


                                        <td class="text-center">
                                                <a href="{{route('show_product_by_id',$product->id)}}" class="btn btn-primary btn-sm fw-bold">view</a>
                                                <a href="{{route('edit_product_by_id',$product->id)}}" class="btn btn-success btn-sm fw-bold">Edit</a>
                                                <a href="" data-id="{{ $product->id }}" class="btn btn-danger btn-sm fw-bold delete">Delete</a>


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
    <form action="{{route('delete_product_by_id','@')}}" method="post" id="delete_form">
        @csrf


    </form>




@endsection

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
<script src="{{ asset('assets/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    $(function() {
        $('#productTable').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [

                { "data": "name" },
                { "data": "Category name" },
                { "data": "Color" },
                { "data": "Size" },
                { "data": "Price" },
                { "data": "status" }
            ]*/
        });
    })
</script>
@endsection