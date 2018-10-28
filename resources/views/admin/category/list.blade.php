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
                    <li><a href="admin/category/danhsach">All Category</a></li>
                </ul>
            <div class="row">
                @include('errors.note')
                <div class="box-content">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach( $category as $cate)
                    <tbody>
                        <tr class="odd gradeX" align="center">
                        <td> {{$cate->id}} </td>
                        <td class="center">{{$cate->name}}</td>
                        <td class="center"><div style="width:170px">{!!$cate->description!!}<div></td>
                        <td class="center">
                            @if($cate->publication_status == 1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Unactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($cate->publication_status == 1)
                            <a class="btn btn-danger" href="admin/category/unactive/{{$cate->id}}">
                                <i class="halflings-icon white thumbs-down"></i> 
                            </a>
                            @else
                            <a class="btn btn-success" href="admin/category/active/{{$cate->id}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif
                            <a class="btn btn-info" href="admin/category/sua/{{$cate->id}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="admin/category/xoa/{{$cate->id}}" id="delete">
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