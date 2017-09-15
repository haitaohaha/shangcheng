@extends('admin.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商家列表
        <small>商家列表</small>
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
              <h3 class="box-title">我们商城的店家</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" method = "get">
                <thead>
           <form action="{{ url('/admin/user/index') }}">
			
           </form>
                <tr>
                  <th>ID</th>
                  <th>商家名</th>
                  <th>卖家名</th>
                  <th>店铺图片</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $val)
                
                <tr>
                  <td>{{ $val->id}}</td>
                  <td>{{ $val->name}}</td>
                  <td>{{ $val->sellers}}</td>
                  <td><img style="width:50px;height: 50px" src="/uploads/sellers/{{ $val->picture }}"</td>
                  <td><a href="{{ url('/admin/sellers/edit') }}/{{ $val->id}}">编辑</a>|<a href="{{ url('/admin/sellers/delete') }}/{{ $val->id}}">删除</a></td>
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