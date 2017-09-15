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
        <span>网站配置修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="{{url('admin/config').'/'.$data->conid}}" method="post">
            <input type="hidden" name="_method" value="put">
            <div class="mws-form-inline">
                
                <div class="mws-form-row">
                    <label class="mws-form-label">备案信息</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="record" value="{{$data->record}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">联系方式(电话)</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="contact" value="{{$data->contact}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">网站logo:</label>
                      <div class="mws-form-item" style="border: 5px solid #ddd; width:400px; height:200px">
                         <img src="{{url('/uploads/images')}}/{{ $data->logo}}"  style=" width:100%; height:100%" alt="">
                      </div>
                </div>
            </div>
             <div class="form-group">
                <label for="exampleInputFile">选择网站logo</label>
                 <input type="file" id="exampleInputFile" name="logo" value="{{ $data->logo}}">
            </div><br/><br/>
            {{ csrf_field() }}
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <input type="reset" value="重置" class="btn">
            </div>
        </form>
    </div>
</div>
@endsection