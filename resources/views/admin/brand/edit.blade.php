@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
                <ul class="breadcrumb">
                        <li>
                            <h2><a href="admin/brand/danhsach">Brand</a></h2>
                            <i class="icon-angle-right"></i> 
                        </li>
                        <li>
                            <a href="#">{{$brand->name}}</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('errors.note')
                    <form action="admin/brand/sua/{{$brand->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                                <label>Category </label>
                                <select class="form-control" name="category_name">
                                    @foreach($category as $cate)
                                    <option 
                                    @if($brand->id_category == $cate->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input class="form-control" name="brand_name" placeholder="Please Enter Brand Name" value="{{$brand->name}}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Brand Edit</button>
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