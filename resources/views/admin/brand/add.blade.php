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
                            <a href="#">Add Brand</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                @include('errors.note')
                    <form action="admin/brand/them" method="POST">
                    @csrf
                        <div class="form-group">
                            <label>Category </label>
                            <select class="form-control" name="category_name">
                                @foreach($category as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input class="form-control" name="brand_name" placeholder="Please Enter Brand Name" />
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
                        <button type="submit" class="btn btn-primary">Brand Add</button>
                        <button type="reset" class="btn btn-default btn-mleft">Reset</button>
                        </div>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection