@extends('admin.layout')

@section('content')

    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <font size="5">添加失败</font>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>商品详情</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('admin/goods').'/'.$data->gid}}" method="post">
              <input type="hidden" name="_method" value="put">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名称:</label>
                        <div class="mws-form-item">
                             <input type="text" size="width:10px;" name="gname" value="{{$data->gname}}">
                        </div>
                    </div>                 
                    <div class="mws-form-row">
                        <label class="mws-form-label">商家名称:</label>
                        <div class="mws-form-item">
                            <p class="small" name="sname" >{{ $data['sname']}}</p>
                        </div>
                    </div>
                       <div class="mws-form-row">
                        <label class="mws-form-label">商品库存:</label>
                        <div class="mws-form-item">
                            <input type="text" name="gcount" size="width:10px;" value="{{$data->gcount}}"> 件
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">商品单价:</label>
                        <div class="mws-form-item">
                            <input type="text" name="gprice" size="width:10px;" value="{{$data->gprice}}"> 元
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-list">
                            <input type="radio" name="gstatus" @if($data->gstatus==1) checked @endif value="1">在售
                            <input type="radio" name="gstatus" @if($data->gstatus==2) checked @endif value="2">售完
                        </div>

                    </div>
                </div>
             
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品图片:</label>
                        <div class="mws-form-item" style="border: 5px solid #ddd; width:90px; height:100px">
                            <img src="{{url('/uploads/images')}}/{{ $data['gimage']}}"  style=" width:100%; height:100%" alt="">
                        </div>
                    </div>
                    
                {{ csrf_field() }}
                  <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>
            </form>
        </div>
    </div>
@endsection