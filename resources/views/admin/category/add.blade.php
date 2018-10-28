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
                            <a href="#">Add Category</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                @include('errors.note')
                    <form action="admin/category/them" method="POST">
                    @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="category_name" placeholder="Please Enter Category Name" />
                        </div>
                        <div class="control-group hidden-phone">
                                <div class="form-group">
                                        <label>Category Description</label>
                                        <textarea id="demo" name="category_description" class="form-control ckeditor" rows="3"></textarea>
                                </div>
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
                        <button type="submit" class="btn btn-primary">Category Add</button>
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