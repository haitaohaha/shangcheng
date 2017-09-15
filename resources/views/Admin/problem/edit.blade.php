@extends('admin.layout')

@section('title')
留言详情
@endsection

@section('css')
<link rel="stylesheet" href="/admin/css/page.css" type="text/css">
@endsection

@section('content')

<div class="mws-panel grid_8">
                  <div class="mws-panel-header">
                      <span>问题详情</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                      <form class="mws-form" action="form_layouts.html">
                        <div class="mws-form-inline">
                          <div class="mws-form-row">
                            <label class="mws-form-label">用户名称</label>
                            <div class="mws-form-item">
                              <input type="text" class="small" value="{{$data->uname}}" readonly>
                            </div>
                          </div>
                           <div class="mws-form-row">
                            <label class="mws-form-label">问题标题</label>
                            <div class="mws-form-item">
                              <input type="text" class="small" value="{{$data->pname}}" readonly>
                            </div>
                          </div>
                          
                          <div class="mws-form-row">
                            <label class="mws-form-label">问题内容</label>
                            <div class="mws-form-item">
                              <textarea readonly rows="" cols="" class="large">{{$data->prname}}</textarea>
                            </div>
                         
                            </div>
                            <div class="mws-form-row">
                            <label class="mws-form-label">回答内容</label>
                            <div class="mws-form-item">
                              <textarea readonly rows="" cols="" class="large">{{$data->pranwer}}</textarea>
                            </div>
                         
                            </div>
                            <div><button class="btn btn-primary"><a href="{{url('admin/Problem/')}}">返回</a></button></div>
                          </div>
                      </form>
                    </div>      
                </div>

@endsection