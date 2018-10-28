@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
	
<div class="container">
    <div id="content">
        
        <form action="{{route('signup')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors as $er)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ và tên*</label>
                        <input type="text" id="your_last_name" name="name" required>
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ</label>
                        <input type="text" id="adress" name="address" >
                    </div>


                    <div class="form-block">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input style="height:37px" type="password" id="phone1" name="password" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Nhập lại mật khẩu*</label>
                        <input style="height:37px" type="password" id="phone2" name="repassword" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
