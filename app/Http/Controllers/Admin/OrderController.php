<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

       $count = $request -> input('count',5);

        $data = Order::join('order_goods','order.oid', '=' , 'order_goods.oid')
        ->join('goods','order_goods.gid','=','goods.gid')
        ->join('goods_attr','goods.gaid','=','goods_attr.gaid')
        ->select('goods.gname','order.order','order_goods.onum','order_goods.oprice','goods_attr.ganame')
        ->paginate($count);

        // dd($data);
      
         
        return view('admin.order.show',['data'=>$data,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Order::join('order_dist','order.oid','=','order_dist.oid')
                ->join('eval','order.uid','=','eval.uid')
                ->join('cart','cart.sid','=','eval.sid')
                ->join('addr','order_dist.did','=','addr.did')
                ->select('order_dist.odid','order.order','addr.dname','order_dist.uway','order_dist.ostatus','cart.cafee','order_dist.ocoupon','order_dist.endprice','eval.ereply','cart.cafee')
                ->get();
        // dd($data);

                return view('admin.order.create',['data'=>$data]);

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
        $data = \DB::table('eval')->first();
        // dd($data);
        return view('admin.order.edit',['data'=>$data]);
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
