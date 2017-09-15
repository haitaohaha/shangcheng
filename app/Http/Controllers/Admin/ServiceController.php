<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Service;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo '11111';
        $data = Service::join('order','service.oid','=','order.oid')
        ->select('service.*','order.order')
        ->get();
        // dd($data);
        return view('admin.service.index',['data'=>$data]);
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
       $data = Service::join('order','service.oid','=','order.oid')
       ->where('wid',$id)
       ->join('seller','seller.sid','=','order.sid')
       ->join('goods','goods.sid','=','seller.sid')
       ->select('service.wtime','service.wstatus','order.order','seller.sname','goods.gname','goods.gimage')
       ->first();
       // dd($data);

       return view('admin.service.show',['data'=>$data]);
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
       $data = Service::join('order','service.oid','=','order.oid')
        ->where('wid',$id)
        ->select('service.weval','order.order')
        ->first();
        // dd($data);
        return view('admin.service.edit',['data'=>$data]);
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
