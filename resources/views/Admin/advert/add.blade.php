@extends('seller.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      广告管理
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
              <form role="form" action="{{url('seller/advert')}}" method="post">
                <input type="hidden" name="gid" value="{{ $data[0]['gid']}}">
                  <div class="box-body">
                        <div class="form-group">
                          <h3><label for="exampleInputEmail1">店家:
                           <p class="small" name="sname" >{{ $data[0]['sname']}}</label></p></h3>
                      </div><br/>
                      <div class="form-group">
                          <label for="exampleInputEmail1">选择广告位</label><br/>
                          <select name="grname" class="form-control">
                            @foreach($data as $key=>$val)
                            <option value="{{ $val->grname}}">{{ $val->grname }}</option>
                            @endforeach
                          </select>
                      </div><br/>
                  <!-- /.box-body -->
                  {{ csrf_field() }}
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