@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif
@if(Session('thongbao'))
    <div class="alert alert-success">
        {{Session('thongbao')}}
    </div>
@endif