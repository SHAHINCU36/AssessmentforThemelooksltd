@extends('admin.layouts.master')
@section('title','new product insert form')

@section('content')



    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mx-auto">
                    @if($message = Session::get('message'))
                        <h4 class="text-center text-success fw-bolder mb-4">{{ $message }}</h4>
                    @endif

                    <div class="card">

                        <div class="card-header">
                            <h2 class="text-center">Add Product</h2>
                        </div>

                        <div class="card-body">

                            <form action="{{route('storeproduct')}}" method="post">
                                @csrf
                                @method('post')


                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Product Name </label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Category Name </label>
                                    <div class="col-md-8">
                                        <select name="category_id" id="categoryId" class="form-control">
                                            <option value="" disabled selected>Select  category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Sub Category Name </label>
                                    <div class="col-md-8">
                                        <select name="sub_category_id" id="subCategoryId" class="form-control">
                                            <option value="" disabled selected>Select a sub category</option>
                                            @foreach($subCategories as $subCategory)
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Color </label>
                                    <div class="col-md-8">
                                        <select name="color" id="colorid" class="form-control">
                                            <option value="" disabled selected>Select color</option>
                                            <option value="Black" >Black</option>
                                            <option value="White" >White</option>
                                            <option value="Blue" >Blue</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Size</label>
                                    <div class="col-md-8">
                                        <select name="size" id="sizeid" class="form-control">
                                            <option value="" disabled selected>Select size</option>
                                            <option value="Small" >Small</option>
                                            <option value="Medium" >Medium</option>
                                            <option value="Large" >Large</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Price</label>
                                    <div class="col-md-8">
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="New Product" class="btn btn-block  btn-outline-success" />

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


@section('script')
    <script>
        $(document).on('change','#categoryId', function (){
            var categoryId = $(this).val();
            $.ajax({
                method: 'GET',
                url: "{{url('/get-sub-category-by-category-id')}}",
                data: {id: categoryId, a: 'bitm'},
                dataType: 'JSON',
                success: function (res){
                    var option = '';
                    option += '<option value="" disabled selected>Select a sub category</option>';
                    $.each(res, function (key, value){
                        option += '<option value="'+value.id+'">'+value.name+'</option>';
                    })
                    $('#subCategoryId').empty().append(option);
                },
                error: function (e) {
                    console.log(e);
                }
            });
        })
    </script>
@endsection
