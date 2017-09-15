<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class goods_attr extends Model
{
    protected $table = 'goods_attr';
    //设置主键
    protected $primaryKey = 'gaid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
