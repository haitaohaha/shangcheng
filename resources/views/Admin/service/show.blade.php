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
            <span>订单详情</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">订单号:</label>
                        <div class="mws-form-item">
                            <p class="small" name="exname" >{{ $data['order']}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名称:</label>
                        <div class="mws-form-item">
                            <p class="small" name="contacts" >{{$data['gname']}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">店家名称:</label>
                        <div class="mws-form-item">
                            <p class="small" name="sname" >{{$data['sname']}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">维修/退款:</label>
                        <div class="mws-form-item">
                            <p class="small" name="wstatus" >{{ config('lyg_service.wstatus')[$data['wstatus']]  }}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">维修时间:</label>
                        <div class="mws-form-item">
                            <p class="small" name="csname" >{{$data['wtime']}}天</p>
                        </div>
                    </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">维修商品图片:</label>
                        <div class="mws-form-item" style="border: 5px solid #ddd; width:150px; height:150px">
                            <img src="{{url('/uploads/images')}}/{{ $data['gimage']}}"  style=" width:100%; height:100%" alt="">
                        </div>
                    </div>
                    
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection