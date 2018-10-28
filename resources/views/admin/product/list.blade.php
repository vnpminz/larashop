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
                    <li><a href="admin/product/danhsach">All Product</a></li>
                </ul>
            <div class="row">
                @include('errors.note')
                <div class="box-content">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach( $product as $pr)
                    <tbody>
                        <tr class="odd gradeX" align="center">
                        <td> {{$pr->id}} </td>
                        <td class="center">
                            <p>{{$pr->name}}</p>
                        <img width="100px" src='upload/product_image/{{$pr->image}}'/>
                        </td>
                        <td class=""><div style="width:170px">{!!$pr->description!!}</div></td>
                        <td class="center">{{$pr->brand->category->name}}</td>
                        <td class="center">{{$pr->brand->name}}</td>
                        <td class="center">{{$pr->price}}</td>
                        <td class="center">{{$pr->size}}</td>
                        <td class="center">
                            @if($pr->publication_status == 1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Unactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($pr->publication_status == 1)
                            <a class="btn btn-danger" href="admin/product/unactive/{{$pr->id}}">
                                <i class="halflings-icon white thumbs-down"></i> 
                            </a>
                            @else
                            <a class="btn btn-success" href="admin/product/active/{{$pr->id}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif
                            <a class="btn btn-info" href="admin/product/sua/{{$pr->id}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="admin/product/xoa/{{$pr->id}}" id="delete">
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