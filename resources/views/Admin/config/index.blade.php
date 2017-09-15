@extends('admin.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/admin/css/page_page.css">
@endsection

@section('content')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 网站配置</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <h4>网站配置信息</h4>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>关键字: <input type="text" name="search" value="{{ $request['search'] or ''}}" /></label>
                    <button>搜索</button>
                </div>
                </form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    <thead>
                    <tr>
                        <th>网站配置ID</th>
                        <th>网站logo</th>
                        <th>备案信息</th>
                        <th>联系方式</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($data as $k=>$v)
                        <tr>
                            <td>{{ $v->conid}}</td>
                            <td><img src="{{asset('uploads/images')}}/{{ $v->logo }}" width="50px";height="50px"></td>
                            <td>{{ $v->record }}</td>
                            <td>{{ $v->contact }}</td>
                            <td>
                                <a href="{{url('admin/config/'.$v->conid.'/edit')}}" title="修改" style="color:#000;font-size:20px;margin-right:15px;"><i class="icon-pencil-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script>

                    function DelUser(id){
                        //询问框
                        layer.confirm('是否确认删除？', {
                            btn: ['确定','取消'] //按钮
                        }, function(){

                            $.post("{{url('admin/user/')}}/"+id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
                                if(data.status == 0){
                                    location.href = location.href;
                                    layer.msg(data.msg, {icon: 6});
                                }else{
                                    location.href = location.href;
                                    layer.msg(data.msg, {icon: 5});
                                }
                            });


                        }, function(){

                        });

                    }


                </script>


                <div class="" id="page_page">

                </div>
            </div>
        </div>
    </div>


@endsection