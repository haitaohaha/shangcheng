<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class goods_recommend extends Model
{
    protected $table = 'goods_recommend';
    //设置主键
    protected $primaryKey = 'grid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
