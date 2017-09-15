@extends('admin.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section  class="content-header">
      <h1>
        友情链接
        <small>友情链接</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
           <form action="{{ url('/admin/youqing/index') }}" method="get">
			<div class="row">
				<div class="col-md-2">

                
			  <div class="col-md-4 col-md-offset-6">

			 </div>
		      
            </div>
           </form>
                <tr>
                  <th>ID</th>
                  <th>网站名称</th>
                  <th>网站地址</th>
                  <th>网站图片</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $val)
                
                <tr>
                  <td>{{ $val->id}}</td>
                  <td>{{ $val->name}}</td>
                  <td>{{ $val->address}}</td>
                  <td><img style="width:50px;height: 50px" src="/uploads/avatar/{{ $val->avatar }}"</td>
                  <td><a href="{{ url('/admin/youqing/edit') }}/{{ $val->id}}">编辑</a
                  >|<a href="{{ url('/admin/youqing/delete') }}/{{ $val->id}}">删除</a></td>
                </tr>
                @endforeach

              </table>

                     <a href="{{ url('/admin/youqing/add') }}"><button type="submit">添加友情链接</button></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
 
@endsection