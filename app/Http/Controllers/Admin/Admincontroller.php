<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use APP\Http\Model\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
     
       $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $all = $request -> all();

        // 把所有的数据获取到 并且分页分配到主页面
        $data = \DB::table('admin')->where('aname','like','%'.$search.'%')-> paginate($count);
        // dd($data);
        return view('admin.admin.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admin.add');
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
        $this->Validate($request,[
            'aname' => 'required',
            'apwd' => 'required|min:6',
            'repassword' => 'required|same:apwd',

        ],[
            'aname.required' => '用户名不能为空',
            'apwd.required' => '密码不能为空',
            'apwd.min' => '密码不能小于6位',
            'repassword.same' => '确认密码不一致',


        ]);

        $data = $request->except('_token','_method','repassword');
        // dd($data);
        $data['atime'] = time();



        $data['apwd'] = md5($data['apwd']);
        $res = \DB::table('admin')->insert($data);
        // dd($res);
        if($res)
        {
            return redirect('admin/admin')->with('error','添加成功');
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
        $data = \DB::table('admin')->where('aid',$id)->first();
        // dd($data);
        return view('admin.admin.edit',['data'=>$data]);
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
        // dd($id);
        // dd($request);
        $data = $request->except('_token','_method');
        // dd($data);
        $res = \DB::table('admin')->where('aid',$id)->update($data);

        if($res)
        {
            return redirect('admin/admin')->with('error','修改成功');
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
        $res = \DB::table('admin')->where('aid',$id)->delete();

        if($res)
        {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        }else
        {
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }

        return $data;
    }
}
