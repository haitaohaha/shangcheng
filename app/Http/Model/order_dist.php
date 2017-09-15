<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class order_dist extends Model
{
    protected $table = 'order_dist';
    //设置主键
    protected $primaryKey = 'odid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
