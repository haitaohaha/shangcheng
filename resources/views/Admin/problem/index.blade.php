@extends('admin.layout')

@section('title')
评价详情
@endsection

@section('css')
<link rel="stylesheet" href="/admin/css/page.css" type="text/css">
@endsection

@section('content')


    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        <div id="DataTables_Table_1_length" class="dataTables_length">
           <form action="{{url('admin/eval')}}" method="get">       
      <label>显示 <select size="1" name="count" >
                        <option value="5" @if(!empty($request['count']) && $request['count'] == 5)  selected @endif>5</option> 
                    </select> 条</label>
     </div>
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>分数: <input type="text" name="search1" value="{{ $request['search'] or ''}}" /></label>
      <label>订单号: <input type="text" name="search2" value="{{ $request['search'] or ''}}" /></label>
      <button>搜索</button>
     </div>
     </form>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
         <thead>
             <tr role="row">
                 <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="   DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria  -label="Rendering engine: activate to sort column descending" style="   width: 170px;" onclick="xianshi()">问题ID
                 </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">问题名称
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 209px;">用户名称
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 148px;">问题标题
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">提问时间
                </th>
            
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">问题答案
                </th>
            </tr>
         </thead>
            @foreach($data as $k => $v)
                   <tr>
                       <td>{{ $v -> prid }}</td>
                       <td>{{ $v -> pname }}</td>
                       <td>{{ $v -> uname }}</td>
                       <td>{{ $v -> prname }}</td>
                       <td>{{date('Y-m-d H:i:s',$v->etime)}}</td>
                       <td><button id="but" class="btn btn-primary" ><a href="{{url('admin/Problem/'.$v->prid.'/edit')}}">查看</a></button></td>
                   </tr>       
               @endforeach
        </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">  
          <div class="" id="page_page">

     </div>
</div>

@endsection