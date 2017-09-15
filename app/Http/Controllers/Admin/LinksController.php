<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use APP\Http\Model\links;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \DB::table('links')->get();
        // dd($data);

        return view('admin.link.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.link.add');
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
        $res = \DB::table('links')->insert($data);

         if($res)
        {
            return redirect('admin/links')->with('error','添加成功');
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
        $data = \DB::table('links')->where('lid',$id)->first();
        // dd($data);

        return view('admin.link.edit',['data'=>$data]);
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

        $res = \DB::table('links')->update($data);

        if($res)
        {
            return redirect('admin/links')->with('error','修改成功');
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
        // dd($id);
        $res = \DB::table('links')->where('lid',$id)->delete();

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
