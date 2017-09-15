<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Goods_Class;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsClassController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        //
       $data = Goods_Class::select("*",\DB::raw("concat(ccid,',',gcid) AS sort_ccid"))->orderBy('sort_ccid')->get();
       
       // echo '<pre>';
       //  print_r($data);die;


       // dd($data);
       //concat 用于连接两个或多个数组
       //raw 用于把字符串转换为数值型

      foreach ($data as $key => $val) {
        // var_dump($val);die;
       $num = substr_count($val->ccid,',');

       //substr_count 计算字符串出现的次数

       $data[$key]->name = str_repeat('|---', $num).$data[$key]->name;

       // str_repeat 用于拼接一个或多个字符串
      
     }

       return view('admin.goodsclass.index',['data'=>$data]);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response$data[$key]->name
     */
    public function create()
    {
        //
        $data = Goods_Class::select("*",\DB::raw("concat(ccid,',',gcid) AS sort_ccid"))->orderBy('sort_ccid')->get();
       
       
      foreach ($data as $key => $val) {
        // var_dump($val);die;
       $num = substr_count($val->ccid,',');

       //substr_count 计算字符串出现的次数

       $data[$key]->name = str_repeat('|---', $num).$data[$key]->name;

       // str_repeat 用于拼接一个或多个字符串
      
     }

       return view('admin.goodsclass.add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        // dd($request->all());
        //

        $data = $request->except("_token");
        // dd($data);
        if($data['pid']== 0){ 
            $data['ccid'] = 0;
        }else{

            $date = Goods_Class::where('gcid',$data['pid'])->first()->ccid;
           // $date_cid = \DB::table('goods_class')->where('gcid',$data['pid'])->first()->ccid;
           
            // dd($date);
            //
            //拼装数组
             $data['ccid'] = $date.','.$data['pid'];
    
        }

          $res = Goods_Class::insert($data);

        if($res)
        {
            return redirect('/admin/goodsclass')->with(['info'=>'添加成功']);
        }else{
            return redirect('/admin/goodsclass/create')->with(['info'=>'添加失败']);
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
        echo "111111a";
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
   
    $data = Goods_Class::select("*",\DB::raw("concat(ccid,',',gcid) AS sort_ccid"))->orderBy('sort_ccid')->get();
    // dd($data);
       
       
      foreach ($data as $key => $val) {
        // var_dump($val);die;
       $num = substr_count($val->ccid,',');

       //substr_count 计算字符串出现的次数

       $data[$key]->name = str_repeat('|---', $num).$data[$key]->name;

       // str_repeat 用于拼接一个或多个字符串
      
     }

        $date = Goods_Class::where('gcid',$id)->first();
        // echo '<pre>';
        // print_r($date);die;

       return view('admin.goodsclass.edit',['data'=>$data,'date'=>$date]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gcid)
    {
        //
        // dd($gcid);
        // dd($request->all());
        $data = $request->except('_token','_method');
        // dd($data);
        
         //判断
        if($data['pid'] == 0){
            $data['ccid'] = 0;
            
        }else{
            // 查询父cid
             $date = Goods_Class::where('gcid',$data['pid'])->first()->ccid;
             // $date = Goods_Class::where('gcid',$data['ccid'])->first()->ccid;
            // dd($date);
            // 拼接数组
            $data['ccid'] = $date.','.$data['pid'];
           
        }
        // dd($data);
        $date = Goods_Class::where('gcid',$gcid)->update($data);

        if($date)
        {
            return redirect('/admin/goodsclass')->with(['info'=>'修改成功']);
        }else{
            return back()->with(['info'=>'修改失败']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gcid)
    {
        //
        // dd($gcid);
    
        $date = \DB::table('goods_cat_t')->where('pid',$id)->count();

        if($date)
            {
                return redirect('/admin/category/index')->with(['info'=>'有数据不能删除']);
            }else{
            $res = \DB::table('goods_cat_t')->where('id',$id)->delete();
            if($res)
                {
                    return redirect('/admin/category/index')->with(['info'=>'删除成功']);
                }else{
                        return back()->with(['info'=>'删除失败']);
                    }
                }
    }
}
