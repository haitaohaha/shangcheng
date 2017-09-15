<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class goods_class extends Model
{
    protected $table = 'goods_class';
    //设置主键
    protected $primaryKey = 'gcid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
