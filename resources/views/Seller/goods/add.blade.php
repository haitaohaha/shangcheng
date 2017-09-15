
@extends('seller.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商品管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
        <li><a href="#">分类管理</a></li>
        <li class="active">添加</li>
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
              <h3 class="box-title">快速添加</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('/seller/goods/')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
            <input type="hidden" name="sid" value="{{ $data[0]['sid'] }}">

			       @if (session('info'))
					    <div class="alert alert-danger">
					       {{ session('info') }}
					    </div>
					@endif


                    @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
              	
                <div class="form-group">
                <label for="exampleInputName">父分类</label>
                <select name="gcid" size="width:15px;" class="form-control">
	                @foreach($data as $key=>$val)
	                <option value="{{ $val->gcid}}">{{ $val->gcname }}</option>
	                @endforeach
                </select>
                </div><br/>
                <div class="mws-form-row">
                  <label for="exampleInputName">商品标题</label>
                  <input type="text" value="" size="width:15px;" name="gname" class="form-control" id="exampleInputName" placeholder="请输入商品标题">
                </div><br/>
                <div class="form-group">
                  <label for="exampleInputName">商品价格</label>
                  <input type="text" value="" size="width:15px;" name="gprice" class="form-control" id="exampleInputName" placeholder="请输入商品价格">
                </div><br/>
                <div class="form-group">
                  <label for="exampleInputName">商品库存</label>
                  <input type="text" value=""width="10px;" name="gcount" class="form-control" id="exampleInputName" placeholder="请输入商品库存">
                </div><br/>
                <div class="mws-form-row">
                      <label class="mws-form-label">状态</label>
                      <div class="mws-form-list">
                          <input type="radio" name="gstatus" @if($data[0]['gstatus']==1) checked @endif value="1">在售
                          <input type="radio" name="gstatus" @if($data[0]['gstatus']==2) checked @endif value="2">售完
                      </div>
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

@endsection