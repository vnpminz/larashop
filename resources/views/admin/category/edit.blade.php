@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
                <ul class="breadcrumb">
                        <li>
                            <h2><a href="admin/category/danhsach">Category</a></h2>
                            <i class="icon-angle-right"></i> 
                        </li>
                        <li>
                            <a href="#">{{$category->name}}</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('errors.note')
                    <form action="admin/category/sua/{{$category->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="category_name" placeholder="Please Enter Category Name" value="{{$category->name}}"/>
                        </div>
                        <div class="control-group hidden-phone">
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea id="demo" name="category_description" class="form-control ckeditor" rows="3">{{$category->description}}</textarea>
                                </div>
                              </div>
                        <button type="submit" class="btn btn-primary">Category Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection