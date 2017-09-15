@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       用户管理
        <small>修改数据</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">请修改你的个性名称</h3>
            </div>

            @if (count($errors) > 0)
            	<div class="alert alert-danger">
            		<ul>
            			@foreach ($errors->all() as $error)
            				<li>{{ $error }}</li>
            			@endforeach
            		</ul>
            	</div>
            @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('/admin/user/update') }}">
            	{{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $data->id }}">
              <div class="box-body">

              {{ session( 'info' )}}
              <div class="form-group">
                  <label for="exampleInputName">用户名</label>
                  <input type="text" name="name" value="{{ $data->name}}" class="form-control" id="exampleInputName" placeholder="Enter uname">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">邮箱</label>
                  <input type="email" name="email" value="{{ $data->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">请输入新密码</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="密码">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">请再次输入密码</label>
                  <input type="password" name="re_password" class="form-control" id="exampleInputPassword2" placeholder="请再次填写你的密码">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">选择个人头像</label>
                  <input type="file" name="avatar" id="exampleInputFile"><br/>

                  <p class="help-block">如果有需要请拨打17604865188.</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">確認修改</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection