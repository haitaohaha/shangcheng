<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin;


class LoginController extends Controller
{
   public function index()
    {

    
        
    }

    public function create()
    {

        
          return view('admin.login.login');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $data = $request->except("_token");
      
          // 验证码是否正确
        $code = session('code');
        if($code !== $data['code'])
        {
            return back()->with(['info' => '验证码错误']);
        }

     


        // 验证是否记住我
        $remember_token = \Cookie::get('remember_token');
        if($remember_token)
        {   $admin = admin::first();
     
        dd($admin);

        // 存入session
        session(['master' => $admin]);

            return redirect('/admin/index') -> with(['info' => '登陆成功']);
        }

      

        // 查询用户
        $user = Admin::where('aname',$data['name'])->first();


       // dd($user);
        // 判断
        if(!$user)
        {
            return back()->with(['info' => '该用户不存在']);
        }

        // 将用户数据存入 session
        session(['master' => $user]);

        // 写入 cookie
        if($request->has('remember_me')){
            \Cookie::queue('remember_me',$user->remember_token,10);
        }
        
        // 跳转后台主页
        return redirect('/admin/index')->with(['info' => '登陆成功']);
   
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
