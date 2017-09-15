<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use App\Http\Model\Seller;
use App\Http\Model\SellerDetail;
use Illuminate\Support\Facades\Crypt;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session; 
use Cookie;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('seller.login.login');
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


        $data = $request->except("_token");
           // dd($data);
      
          // 验证码是否正确
        $code = session('code');
        // dd($code);
        if($code !== $data['code'])
        {
            return back()->with(['info' => '验证码错误']);
        }

     


        // 验证是否记住我
        $remember_token = \Cookie::get('remember_token');
        // dd($remember_token);
// 
        if($remember_token)
        {   $admin = Seller::first();
     
        // dd($admin);

        // 存入session
        session(['master' => $admin]);

            return redirect('/seller/index') -> with(['info' => '登陆成功']);
        }

      

        // 查询用户
        $user = Seller::where('sname',$data['sname'])->first();


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
            \Seller::queue('remember_me',$user->remember_token,10);
        }
        
        // 跳转后台主页
        return redirect('/seller/index')->with(['info' => '登陆成功']);
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
