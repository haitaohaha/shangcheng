<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Model\Goods;
use App\Http\Model\Goods_Class;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Http\Model\Goods_recommend;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd($request);

//          if($request->has('keywords')){
//             $key = trim($request->input('keywords')) ;
//             dd($key);
//             $user = Goods::where('cname','like',"%".$key."%")->where('sid',session('seller_user')['sid'])->paginate(5);
//             dd($user);
// //            dd($user);
//             return view('seller/goodsclass/goodsclass',['cate'=>$user,'key'=>$key]);
//         }else{
// //            return 22222;
//             //查询出user表的所有数据
//             $user =  Goods::where('sid',session('master')['sid'])->orderBy('gcid','asc')->paginate(5);
//             dd($user);
//             //      向前台模板传变量的第一种方法
//             return view('seller.goods.index',['user'=>$user]);
//         }

        // // dd($request);
        $data = Goods::join('seller','goods.sid','=','seller.sid')
        ->where('Goods.sid',session('master')['sid'])
        ->join('goods_class','seller.sid','=','goods_class.sid')
        ->orderBy('goods.gcid','desc')
        ->paginate(5);
        // dd($data);
        return view('seller.goods.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $value = Input::session()->get('master');
        // dd($value);
        $data = Goods::join('goods_class','goods.gcid','=','goods_class.gcid')
        ->where('goods_class.sid',$value->sid)
        ->get();
        // dd($data);
        return view('seller.goods.add',['data'=>$data]);

        
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ima($id)
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
        // dd($request);
        $data = $request->except('_token','_method');
        // dd($data);

        $res = Goods::where('sid',$data['sid'])->insert($data);

        if($res)
        {
            return redirect('seller/goods')->with('error','添加成功');
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
        //

        // dd($id);

         $data = Goods::join('seller','goods.sid','=','seller.sid')
        ->where('Goods.gid',$id)
        ->join('goods_class','seller.sid','=','goods_class.sid')
        ->orderBy('goods.gcid','desc')
        ->paginate(5);

        $res = Goods_recommend::get();
        // dd($res);

        // dd($data);
        return view('seller.goods.edit',['data'=>$data,'res'=>$res]);
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
        // dd($id);

        $data = $request->except('_token','_method');

        // dd($data);
       
       

        if($data['grstatus'] === "0")
        {
            unset($data['grname']);
             $res1 = Goods::where('gid',$id)->update($data);
            
        }else
        {
            $res1 = Goods::where('gid',$id)->update($data);

        }

        if($res1)
        {
            return redirect('seller/goods')->with('error','修改成功');
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
