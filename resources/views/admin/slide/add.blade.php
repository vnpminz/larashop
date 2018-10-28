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
                            <a href="admin/slide/them">Add Slide</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                @include('errors.note')
                    <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Slide Name</label>
                            <input class="form-control" name="slide_name" placeholder="Please Enter Slide Name" />
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="slide_image" class="form-control">
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
                        <button type="submit" class="btn btn-primary">Slide Add</button>
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