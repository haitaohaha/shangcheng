@extends('admin.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        分类列表
        <small>分类列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">光顾我们商城的分类</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" method = "get">
                <thead>
           <form action="{{ url('/admin/category') }}">
		
           
                <tr>
                  <th>ID</th>
                  <th>分类名</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $val)
                
                <tr class="parent">
                  <td>{{ $val->id }}</td>
                  <td>{{ $val->name }}</td>
                  <td><a href="{{ url('/admin/category/edit') }}/{{ $val->id}}">编辑</a> |
                  <a href="{{ url('/admin/category/delete') }}/{{ $val->id}}">删除</a>
                  </td>
                </tr>
                @endforeach
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
