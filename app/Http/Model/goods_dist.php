<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class goods_dist extends Model
{
    protected $table = 'goods_dist';
    //设置主键
    protected $primaryKey = 'gdid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
