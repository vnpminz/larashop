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
                            <a href="admin/user/them">Add User</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                @include('errors.note')
                    <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>User Name</label>
                            <input class="form-control" name="user_name" placeholder="Please Enter User Name" />
                        </div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="email" class="form-control" name="user_email" placeholder="Please Enter User Email" />
                        </div>
                        <div class="form-group">
                            <label>User Password</label>
                            <input type="password" class="form-control" name="user_password" placeholder="Please Enter User Password" />
                        </div>
                        <div class="form-group">
                            <label>User RePassword</label>
                            <input type="password" class="form-control" name="user_passwordagain" placeholder="Please Enter User Password Again" />
                        </div>
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="level" value="1" type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="2" checked="" type="radio">Employee
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="3" type="radio">Shipper
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <label class="radio-inline">
                                <input name="status" value="1" checked="" type="radio">Active
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="2" type="radio">Unactive
                            </label>
                        </div>
                        <div class="form-actions">
                        <button type="submit" class="btn btn-primary">User Add</button>
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