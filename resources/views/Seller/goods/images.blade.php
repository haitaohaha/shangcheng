@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       用户管理
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
              <h3 class="box-title">请输入你的个性名称</h3>
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
            <form role="form" method="post" action="{{ url('/admin/goods/images') }}" enctype="multipart/form-data">
            	{{ csrf_field() }}
              <div class="box-body">

              {{ session( 'info' )}}
                <div class="form-group">
                <label for="exampleInputName">商品名</label>
                <select name="lid" class="form-control">
                  @foreach($data as $key=>$val)
                  <option value="{{ $val->id}}">{{ $val->title }}</option>
                  @endforeach
                </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">选择图片</label>
                  <input type="file" name="picturea" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">选择图片</label>
                  <input type="file" name="pictureb" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">选择图片</label>
                  <input type="file" name="picturec" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">选择图片</label>
                  <input type="file" name="pictured" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">选择图片</label>
                  <input type="file" name="picturee" id="exampleInputFile">
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