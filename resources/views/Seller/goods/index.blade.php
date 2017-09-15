@extends('seller.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商品列表
        <small>商品列表</small>
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
              <h3 class="box-title">我们商城的商品</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" border= 1 class="table table-bordered table-hover" method = "get" width="1150">
                <thead>

           <form action="{{ url('/admin/user/index') }}">
			<div class="row">

                <tr>
                  <th>ID</th>
                  <th>商品名</th>
                  <th>商品图片</th>
                  <th>价格</th>
                  <th>库存</th>
                  <th>状态</th>
                  <th>编辑</th>
                </tr>

                <tbody>
                @foreach($data as $v)
                <tr>
                  <td align="conter">{{$v['gid']}}</td>
                  <td align="conter">{{$v['gname']}}</td>
                  <td align="conter"><img src="{{asset('uploads/images')}}/{{ $v['gimage'] }}" width="50px";height="50px"></td>
                  <td align="conter">{{$v['gprice']}}</td>
                  <td align="conter">{{$v['gcount']}}</td>
                  <td align="conter">{{ config('lyg_goods.gstatus')[$v['gstatus']]}}</td>
                    <td align="conter"><conter><a href="{{ url('/admin/goods/ima') }}/{{ $v->id}}">添加图片</a>|<a href="{{ url('/admin/goods/att') }}/{{ $v->id}}">属性</a>|<a href="{{url('seller/goods/'.$v->gid.'/edit')}}">编辑</a>|<a href="{{ url('/admin/goods/delete') }}/{{ $v->id}}">删除</a></conter></td>
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
        </form>
        </thead>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection