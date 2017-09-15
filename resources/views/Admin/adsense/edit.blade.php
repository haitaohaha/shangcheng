@extends('admin.layout')

@section('content')

    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <font size="5">修改失败</font>
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
            <form class="mws-form" action="{{url('admin/advert').'/'.$data['gid']}}" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商家名:</label>
                        <div class="mws-form-item">
                            <p class="small" name="exname" >{{ $data['sname']}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名:</label>
                        <div class="mws-form-item">
                            <p class="small" name="contacts" >{{$data['gname']}}</p>
                        </div>
                    </div>
                
                
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品图片:</label>
                        <div class="mws-form-item">
                            <img src="{{url('/uploads/images')}}/{{ $data['gimage']}}" alt="">
                        </div> 
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-list">
                            <input type="radio" name="grstatus" @if($data['grstatus']==1) checked @endif value="1">待审核
                            <input type="radio" name="grstatus" @if($data['grstatus']==2) checked @endif value="2">审核通过
                            <input type="radio" name="grstatus" @if($data['grstatus']==3) checked @endif value="3">审核未通过
                            <input type="radio" name="grstatus" @if($data['grstatus']==4) checked @endif value="4">商家资料未提交
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="审核" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection