@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contacts</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Contacts</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">
    
    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.677531287182!2d105.84127411465359!3d21.00555959394645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1545757262817" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        
        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Liên hệ với chúng tôi</h2>
                <div class="space20">&nbsp;</div>
                <p>Nếu bạn không hài lòng với dịch vụ của chúng tôi, vui lòng điền thông tin vào FORM dưới đây để phản hồi và được hỗ trợ một cách tốt nhất.</p>
                <div class="space20">&nbsp;</div>
                <form action="#" method="post" class="contact-form">	
                    <div class="form-block">
                        <input name="your-name" type="text" placeholder="Tên của bạn (required)">
                    </div>
                    <div class="form-block">
                        <input name="your-email" type="email" placeholder="Email của bạn (required)">
                    </div>
                    <div class="form-block">
                        <input name="your-subject" type="text" placeholder="Vấn đề">
                    </div>
                    <div class="form-block">
                        <textarea name="your-message" placeholder="Lời nhắn"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi phản hồi <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Thông tin liên hệ</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title">Địa chỉ</h6>
                <p>
                    Số 1, Đại Cồ Việt<br>
                    Hai Bà Trưng <br>
                    Hà Nội
                </p>
                <div class="space20">&nbsp;</div>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection