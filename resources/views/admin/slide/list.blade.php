@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
                <ul class="breadcrumb">
                    <li>
                        <h2><a href="#">Home</a> </h2>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="admin/slide/danhsach">All Slider</a></li>
                </ul>
            <div class="row">
                @include('errors.note')
                <div class="box-content">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Slide Name</th>
                            <th>Slide Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach( $slide as $sli)
                    <tbody>
                        <tr class="odd gradeX" align="center">
                        <td> {{$sli->id}} </td>
                        <td> {{$sli->name}} </td>
                        <td class="center"><p><img width="400px" src="upload/slide_image/{{$sli->image}}" ></p></td>
                        <td class="center">
                            @if($sli->publication_status == 1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Unactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($sli->publication_status == 1)
                            <a class="btn btn-danger" href="admin/slide/unactive/{{$sli->id}}">
                                <i class="halflings-icon white thumbs-down"></i> 
                            </a>
                            @else
                            <a class="btn btn-success" href="admin/slide/active/{{$sli->id}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif
                            <a class="btn btn-info" href="admin/slide/sua/{{$sli->id}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="admin/slide/xoa/{{$sli->id}}" id="delete">
                                <i class="halflings-icon trash"></i>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                  @endforeach
                </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection