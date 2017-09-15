@extends('seller.layout')

@section('title')
    商家中心
@endsection

@section('content')

            <div class="row-content am-cf">

                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">商家信息</div><br>
                                @if(session('error'))
                                    <p style="color:red">  {{session('error')}}</p>
                                @else(seeeion('success'))
                                    <p style="background:green">  {{session('success')}}</p>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="mark" style="color:red">
                                        <ul>
                                            @if(is_object($errors))
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            @else
                                                <li>{{ $errors }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <div class="mws-form-row">
                                <label class="mws-form-label">门店logo:</label>
                                 <div class="mws-form-item" style="border: 5px solid #ddd; width:240px; height:120px">
                                <img src="{{url('/uploads/images')}}/{{ $data['slogo']}}"  style=" width:100%; height:100%" alt="">
                                </div>
                            </div><br/>

                                <form class="am-form tpl-form-border-form" action="{{url('seller/index/')}}/{{ session('master')['sid'] }}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="put">
                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-12 am-form-label am-text-left">营业时间 <span class="tpl-form-line-small-title">Business Hours</span></label><br/><br/>
                                        <label class="am-form-label am-text-left" for="age" style="margin-top:20px;">
                                            <span style="float:left;margin-left:20px;">开始时间</span>
                                            <input type="number" name="starttime" id="time1" min="0" max="24" step="1" value="{{ $data->starttime }}" style="color:red;width:60px;float:left;">
                                            <span style="float:left;">结束时间</span>
                                            <input type="number" name="endtime" id="time2" min="0" max="24" step="1" value="{{ $data->endtime }}" style="color:red;width:60px;float:left;">
                                        </label>
                                    </div><br/><br/>
                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-12 am-form-label am-text-left">营业状态 <span class="tpl-form-line-small-title">Operating Status</span></label><br/><br/>
                                        <label class="am-form-label am-text-left" for="age" style="margin-top:20px;">

                                            <input type="radio" name="operastatus" id="open" value="1" @if($data->operastatus == 1) checked @endif style="color:#000;width:60px;float:left;"><span style="float:left;">正常营业</span>
                                            <input type="radio" name="operastatus" id="close" value="2" @if($data->operastatus == 2) checked @endif style="color:#000;width:60px;float:left;"><span style="float:left;">歇业</span>
                                        </label>
                                    </div><br/><br/>
                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">商铺地址 <span class="tpl-form-line-small-title">Addr</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" id="user-weibo" name="mmtadd" class="am-margin-top-xs" value="{{ $data->mmtadd }}">
                                        </div>
                                    </div><br/>

                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">联系电话 <span class="tpl-form-line-small-title">Tel</span></label>
                                        <div class="am-u-sm-12">
                                            <input type="text" id="user-weibo" name="extel" class="am-margin-top-xs" value="{{ $data->extel }}">
                                        </div>
                                    </div><br/>

                                    <div class="am-form-group">
                                        <div class="am-u-sm-12 am-u-sm-push-12">
                                            <input type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success " value="修改">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
@endsection