@extends('admin.layout')

@section('content')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>商家详情</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('seller/update')}}" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商家名:</label>
                        <div class="mws-form-item">
                            <p class="small" name="exname" >{{ $data['exname']}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">联系人:</label>
                        <div class="mws-form-item">
                            <p class="small" name="contacts" >{{$data['contacts']}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">外卖电话:</label>
                        <div class="mws-form-item">
                            <p class="small" name="extel" >{{$data['extel']}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商家类别:</label>
                        <div class="mws-form-item">
                            <p class="small" name="csname" >{{$data['csid']}}</p>
                        </div>
                    </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">门店logo:</label>
                        <div class="mws-form-item" style="border: 5px solid #ddd; width:400px; height:200px">
                            <img src="{{url('/uploads/images')}}/{{ $data['slogo']}}"  style=" width:100%; height:100%" alt="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">门店图片:</label>
                        <div class="mws-form-item" style="border: 5px solid #ddd; width:400px; height:200px">
                            <img src="{{url('/uploads/images')}}/{{ $data['eximage']}}"  style=" width:100%; height:100%" alt="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">营业执照:</label>
                        <div class="mws-form-item"  style="border: 5px solid #ddd;  width:400px; height:200px;">
                            <img src="{{url('/uploads/images')}}/{{ $data['licencel']}}" style=" width:100%; height:100%" alt="">
                        </div>
                    </div>
                    
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection