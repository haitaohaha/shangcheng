<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Seller;
class SellerController extends Controller
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
        $count = $request -> input('count',10);
        // dd($count);
         $search = $request -> input('search','');
         // dd($search);
         $all = $request->all;
         // dd($all);
        $data = Seller::where('sname','like','%'.$search.'%')->whereIn('status',[2,4])-> paginate($count);
     // dd($data);

     return view('admin.seller.index',['data'=>$data,'request'=>$all]);
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
         $data = \DB::table('seller_detail')
            ->join('seller', 'seller.sid', '=', 'seller_detail.sid')
             ->where('seller.sid',$id)->first();

        // dd($data);

        return view('admin.seller.show',['data'=>$data]);


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

        $data=Seller::where('sid',$id)->first();

        return view('/admin/seller/edit',compact('data'));
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
        $all = $request->except(['_token','_method']);
        // dd($all);



        $res = Seller::where('sid',$id)->update($all);
        // dd($res);
        if($res){
            //  如果添加成功跳转到分类列表页
            return redirect('admin/seller');
        }else{
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
          // 制作事务
        DB::beginTransaction();
        $re1 = Seller::where('sid',$id)->delete();
        $re2 =  Seller_Detail::where('sid',$id)->delete();
        if($re1 && $re2){
            \DB::commit();
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            \DB::rollBack();
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }

       return $data;
       // return $re2;
       // return $re1;
    }
}
