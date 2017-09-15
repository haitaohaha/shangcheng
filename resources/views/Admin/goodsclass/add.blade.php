@extends('admin.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        分类管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/goodsclass/create')}}"><i class="fa fa-dashboard"></i> 父类添加</a></li>
        <li><a href="#">分类管理</a></li>
        <li class="active">添加</li>
      </ol>
    </section>

    <!-- Main content -->
    <center><section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">快速添加子分类</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('/admin/goodsclass')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
              

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
                  <label for="exampleInputName">分类名</label>
                  <input type="text" value="{{old('gcname')}}" name="gcname" class="form-control" id="exampleInputName" placeholder="请输入分类名">
                </div><br/>
                <div class="form-group">
                <label for="exampleInputName">父分类</label>
                <select name="pid" class="form-control">
                    @foreach($data as $key=>$val)
                    <option value="{{ $val->gcid}}">{{ $val->name }}{{ $val->gcname}}</option>
                    @endforeach
                </select>
                </div>
               
              </div><br/>
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
    </section></center>
    <!-- /.content -->
  </div>

@endsection