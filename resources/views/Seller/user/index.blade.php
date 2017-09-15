@extends('admin.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section  class="content-header">
      <h1>
        用户列表
        <small>用户列表</small>
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
              <h3 class="box-title">光顾我们商城的用户</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
           <form action="{{ url('/admin/user/index') }}" method="get">
      <div class="row">
        <div class="col-md-2">

          <div class="form-group">
                  <select name="num" class="form-control">
                    <option value="10"
                      @if(!empty($request['num'])&&$request['num']==10)
                      selected='selected'
                      @endif
                    >十条数据</option>
                    <option value="20"
                    @if(!empty($request['num'])&&$request['num']==20)
                      selected='selected'
                      @endif
                    >二十条数据</option>
                    <option value="50"
                    @if(!empty($request['num'])&&$request['num']==50)
                      selected='selected'
                      @endif
                    >五十条数据</option>
                    <option value="100"
                    @if(!empty($request['num'])&&$request['num']==100)
                      selected='selected'
                      @endif
                    >一百条数据</option>
                  </select>
                  </div>

        </div>
                
        <div class="col-md-4 col-md-offset-6">
          
        <div class="input-group input-group">
              <input name="keywords" type="text" class="form-control" value="{{old('keywords')}}">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-info btn-flat">搜索</button>
                </span>
            </div>
       </div>
          
            </div>
           </form>
                <tr>
                  <th>ID</th>
                  <th>用户名</th>
                  <th>邮箱</th>
                  <th>大头贴</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $val)
                
                <tr class="parent">
                  <td class="ids">{{ $val->id}}</td>
                  <td class="name" >{{ $val->name}}</td>
                  <td>{{ $val->email}}</td>
                  <td><img style="width:50px;height: 50px" src="/uploads/avatar/{{ $val->avatar }}"</td>
                  <td><a href="{{ url('/admin/user/edit') }}/{{ $val->id}}">编辑</a>|
                    <a class="del" data-toggle="modal" data-target="#myModal">删除</a>
                </tr>
                @endforeach
              </table>
             
            </div>
            {{ $data->appends($request)->links() }}
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

@section('js')
<script type="text/javascript">

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });


  $(".name").one('dblclick',function(){
    // 获取id
    var id = $(this).parents('.parent').find('.ids').html();
    // alert(id);

    $(this).html(inp);

    // 获取原来的值
    var oldname = $(this).html();

    var inp = $("<input type='text'>");
    inp.val(oldname);
    $(this).html(inp);
    inp.select();

   inp.on('blur',function(){
    // 获取新的名字
    var newname = inp.val();
     //执行ajax
    $.ajax('/admin/user/ajax',{
        type:'GET',
        data:{id:id,name:newname},
        success:function(data){
          if(data == '0')
          {
            alert('用户名已经存在');
          }else if(data == '1')
          {
            alert('修改成功');
          }else
          {
            alert('修改失败');
          }
          // alert(data);
        },
        error:function(data){
          alert('数据异常');
        },
        dataType:'json'

    });
  });
});

  var ids = 0;

$(".del").each(function(){

  $(this).click(function(){


    ids = $(this).parents('tr').find('.ids').html();
    
  });
});

// 搜索
$("select").change(function()
  {
    $('button').trigger('click');
  });
</script>
@endsection