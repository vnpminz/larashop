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
                    <li><a href="admin/user/danhsach">All User</a></li>
                </ul>
            <div class="row">
                @include('errors.note')
                <div class="box-content">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Permission</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach( $user as $us)
                    <tbody>
                        <tr class="odd gradeX" align="center">
                        <td> {{$us->id}} </td>
                        <td> {{$us->name}} </td>
                        <td> {{$us->email}} </td>
                        <td class="center">
                            @if($us->permission == 1)
                            <span class="label label-warning">{{"Admin"}}</span>
                            @elseif($us->permission == 2)
                            <span class="label label-primary">{{"Employee"}}</span>
                            @elseif($us->permission ==3)
                            <span class="label label-info">{{"Shipper"}}</span>
                            @else
                            @endif
                        </td>
                        <td class="center">
                            @if($us->status == 1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Unactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($us->status == 1)
                            <a class="btn btn-danger" href="admin/user/unactive/{{$us->id}}">
                                <i class="halflings-icon white thumbs-down"></i> 
                            </a>
                            @else
                            <a class="btn btn-success" href="admin/user/active/{{$us->id}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif
                            <a class="btn btn-info" href="admin/user/sua/{{$us->id}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="admin/user/xoa/{{$us->id}}" id="delete">
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