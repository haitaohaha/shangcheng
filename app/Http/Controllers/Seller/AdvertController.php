<?php

namespace App\Http\Controllers\Seller;
use Input;
use Illuminate\Http\Request;
use App\Http\Model\Goods_recommend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Goods;
use App\Http\Model\Advert;

class AdvertController extends Controller
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
        // echo '11111';
        $data = Advert::join('goods','advert.gid','=','goods.gid')
        ->where()
        $data = Goods::where('sid',session('master')->sid)->whereIn('grstatus',[1])->paginate($count);
        // dd($data);
        return view('seller.guanggao.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $value = Input::session()->get('master');

        $data = Goods_recommend::join('goods','goods.gid','=','Goods_recommend.gid')
        ->get();
        // dd($data);

        return view('seller.guanggao.add',['data'=>$data]);
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
        // echo "111111";
        // dd($request);
        $data = $request->except('_token','_medhot');
        dd($data);

        $res = Goods_recommend::where('');
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
