<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Seller;
use App\Http\Model\Examine;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExamineController extends Controller
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
        $data = Seller::where('sname','like','%'.$search.'%')->whereIn('status',[1,3,5])-> paginate($count);


        return view('admin.examine.index',['data'=>$data,'request'=>$all]);
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

        $all = Seller::where('sid',$id)->first();
        // dd($all);


        $data = Seller::join('seller_detail', 'seller.sid', '=', 'seller_detail.sid')
            ->where('seller_detail.sid',$id)
            ->first();
        // dd($data);

        return view('/admin/examine/show',compact('data','all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sid)
    {
        //
        // dd($request);
        $data = $request->except('_token','_method');
        // dd($data);

        $date = Seller::where('sid',$sid)->update($data);

        if($date)
        {
            return redirect('/admin/examine');
        }else{
            return back()->with('error','很抱歉,添加失败');
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
        DB::beginTransaction();
        $datr = seller::where('sid',$id)->delete();
        $date = seller_detail::where('sid',$id)->delete();
        if($datr && $date)
        {
            DB::commit();
            $data = [
            'status1' => 0,
            'msg' => '删除成功'
            ];
        }else
        {
            DB::rollBack();
            $data = [
            'status1'=>1,
            'msg'=> '删除失败'
            ];
        }



        return $data;


    }
}
