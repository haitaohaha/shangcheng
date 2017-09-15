@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       商铺管理
        <small>添加数据</small>
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
              <h3 class="box-title">请添加商家</h3>
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
            <form role="form" method="post" action="{{ url('/admin/sellers/store')}}" enctype="multipart/form-data">
            	{{ csrf_field() }}
              <div class="box-body">

              {{ session( 'info' )}}
              <div class="form-group">
                  <label for="exampleInputName">商铺名</label>
                  <input type="text" name="name" value="" class="form-control" id="exampleInputName" placeholder="商铺名">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">商铺图片</label>
                  <input type="file" name="picture" id="exampleInputFile">
                  <p class="help-block">请选择图片</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">卖家名</label>
                  <input type="text" name="sellers" value="" class="form-control" id="exampleInputPassword1" placeholder="卖家名">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
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