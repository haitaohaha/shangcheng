<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class Goodscontroller extends Controller
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

        // 把所有的数据获取到 并且分页分配到主页面
        $data = Goods::join('seller','seller.sid','=','goods.sid')
        ->where('gname','like','%'.$search.'%')
        ->select('goods.gid','goods.gname','goods.gimage','seller.sname','goods.gprice','goods.gcount','goods.gstatus')
        -> paginate($count);
      
        // dd($data);
        return view('admin.goods.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.goods.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //去掉token,sname
        // dd($request);
        $data = $request->except('_token');
        // dd($data);
        
        // $sname = [];
        // $sname['sname'] = $_POST['sname'];
        // dd($sname['sname']);
        // $result = \DB::table('seller')->where('sname',$sname['sname'])->select('seller.sid')->first();
        // // dd($result);
        // $one = $result['sid'];
        // dd($one);
        // dd($request->input('gid'));

        // 处理图片 
        if($request->hasFile('gimage')){

            if($request->file('gimage')->isValid())
            {
                // 获取扩展名
                $ext = $request->file('gimage')->extension();
                // 随机文件名
                $filename = time().mt_rand(1000000,99999999).'.'.$ext;
                // 移动
                $request->file('gimage')->move('./uploads/images',$filename);

                // 添加data数据
                $data['gimage']= $filename;
            }
        }

        // 插入数据
        $res = Goods::where('gid',$request->input('gid'))->insert($data);
        // 修改数据
        // $re = Goods::where('gid',$request->input('gid'))->update($one);
        // dd($res);
        // DB::update('update users set name="LaravelAcademy" where name = ?', ['Academy']);
  // $re = DB::update('update lyg_goods set sid='.$one.' where gid='.$request->input('gid').'');


           


        //update lyg_goods set sid=3 where gid=1
 
        // dd($re);
        // A a set a.id = (select DISTINCT goods.sid from Goods b where a.name=b.name)
        if($res || $re)
        {
            return redirect('admin/goods')->with('error','添加成功');
        }else
        {
            return back()->with('error','添加失败');
        }
        


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

        // 把所有的数据获取到 并且分页分配到主页面
        $data = Goods::join('seller','seller.sid','=','goods.sid')
        ->where('gid',$id)
        ->select('goods.gid','goods.gname','goods.gimage','seller.sname','goods.gprice','goods.gcount','goods.gstatus')
        ->first();
        // dd($data);
        return view('admin.goods.edit',['data'=>$data]);
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
        $data = $request->except(['_token','_method']);
        // dd($data);

        $res = Goods::where('gid',$id)->update($data);
        // dd($res);

        if($res)
        {
            return redirect('admin/goods')->with('error','修改成功');
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
        $res = Goods::where('gid',$id)->delete();

        if($res)
        {
            $data = [
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else
        {
            $data = [
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }

        return $data;
    }
}
