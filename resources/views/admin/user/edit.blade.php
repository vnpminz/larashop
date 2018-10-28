@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
                <ul class="breadcrumb">
                        <li>
                            <h2><a href="index.html">Edit</a></h2>
                            <i class="icon-angle-right"></i> 
                        </li>
                        <li>
                            <a href="#">{{$user->name}}</a>
                        </li>
                </ul>
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                @include('errors.note')
                    <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>User Name</label>
                        <input class="form-control" name="user_name" placeholder="Please Enter User Name" value="{{$user->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="email" class="form-control" name="user_email" placeholder="Please Enter User Email" value="{{$user->email}}" readonly="" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePassword" id="changePassword">
                            <label>Change Password</label>
                            <input type="password" class="form-control password" name="user_password" placeholder="Please Enter User Password" disabled=""/>
                        </div>
                        <div class="form-group">
                            <label>User RePassword</label>
                            <input type="password" class="form-control password" name="user_passwordagain" placeholder="Please Enter User Password Again" disabled=""/>
                        </div>
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="level" value="1" 
                                @if($user->permission == 1)
                                {{"checked"}}
                                @endif
                                type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="2" 
                                @if($user->permission == 2)
                                {{"checked"}}
                                @endif
                                type="radio">Employee
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="3" 
                                @if($user->permission == 3)
                                {{"checked"}}
                                @endif
                                type="radio">Shipper
                            </label>
                        </div>
                        <div class="form-actions">
                        <button type="submit" class="btn btn-primary">User Edit</button>
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
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection