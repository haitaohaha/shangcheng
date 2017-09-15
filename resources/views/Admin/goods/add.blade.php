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
            <span>商品添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('admin/goods')}}" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名称</label>
                        <div class="mws-form-item">
                            <input type="text" size="width:15px;" name="gname" value="{{ old('gname') }}">
                        </div>
                    </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">单价</label>
                        <div class="mws-form-item">
                            <input type="text" size="width:15px;" name="gprice" value="{{ old('gprice') }}">
                        </div>
                    </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">库存</label>
                        <div class="mws-form-item">
                            <input type="text" size="width:15px;" name="gcount" value="{{ old('gcount') }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                      <label class="mws-form-label">商品图片</label>
                          <div class="mws-form-item">
                            <input type="file"  name="gimage">
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