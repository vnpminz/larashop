@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
                <ul class="breadcrumb">
                        <li>
                            <h2><a href="index.html">Home</a></h2>
                            <i class="icon-angle-right"></i> 
                        </li>
                        <li>
                            <a href="#">Add Product</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                @include('errors.note')
                    <form action="admin/product/them" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Category </label>
                            <select class="form-control" name="category_name" id="category">
                                @foreach($category as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Brand </label>
                            <select class="form-control" name="brand_name" id="brand">
                                @foreach($brand as $br)
                                <option value="{{$br->id}}">{{$br->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input class="form-control" name="product_name" placeholder="Please Enter Product Name" />
                        </div>
                        <div class="control-group hidden-phone">
                                <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea id="demo" name="product_description" class="form-control ckeditor" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="product_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Product Size</label>
                            <input class="form-control" name="product_size" placeholder="Please Enter Product Size" />
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input class="form-control" name="product_price" placeholder="Please Enter Product Price" />
                        </div>
                        <div class="form-group">
                            <label>Product Color</label>
                            <input class="form-control" name="product_color" placeholder="Please Enter Product Color" />
                        </div>
                        <div class="form-group">
                            <label>Pulication Status</label>
                            <label class="radio-inline">
                                <input name="publication_status" value="1" checked="" type="radio">Active
                            </label>
                            <label class="radio-inline">
                                <input name="publication_status" value="2" type="radio">Unactive
                            </label>
                        </div>
                        <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Product Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#category").change(function(){
                var idBrand = $(this).val();
                $.get("admin/ajax/brand/"+idBrand,function(data){
                    $("#brand").html(data);
                });
            });
        });
    </script>
@endsection