<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\goods;
use App\Http\Model\goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Advertcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $all = $request -> all();
        $data = Goods::join('seller','goods.sid','=','seller.sid')->whereIn('grstatus',[1,3,4])->paginate($count);
        // dd($data);

         return view('admin.advert.index',['data'=>$data,'request'=>$request]);
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
        // dd($id);
            // 把所有的数据获取到 并且分页分配到主页面
        $data = Goods::join('seller','seller.sid','=','goods.sid')
        ->where('gid',$id)
        ->select('goods.gid','goods.gname','goods.grname','goods.grstatus','goods.gimage','seller.sname','goods.gprice','goods.gcount','goods.gstatus')
        ->first();
        return view('admin.advert.edit',['data'=>$data]);
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

        $res = Goods::where('gid',$id)->update($data);

        if ($res) {
           
           return redirect('admin/advert')->with('error','修改成功');
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
