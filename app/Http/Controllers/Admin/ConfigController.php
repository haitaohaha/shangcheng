<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Conf;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = Conf::get();
        // dd($data);
        return view('admin.config.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Conf::where('conid',$id)->first();
        // dd($data);
        return view('admin.config.edit',['data'=>$data]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request);
        $data = $request->except('_token','_method');
        // dd($data);
           // 处理图片

           if($request->hasFile('logo'))
           {
            if($request->file('logo')->isValid())
            {
                // 获取图片扩展名
                $ext = $request->file('logo')->extension();

                // 获取随机名
                $filename = time().mt_rand(1000000,99999999).'.'.$ext;

                // 移动文件

                $request->file('logo')->move('./uploads/images',$filename);

                // 添加数据
                $users['logo'] = $filename;

            }
           }

           $date = Conf::where('conid',$id)->update($data);

           if($date)
           {
              return redirect('admin/config')->with('error','修改成功');
           }else
           {
              return back()->with('error','修改失败');
           }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
