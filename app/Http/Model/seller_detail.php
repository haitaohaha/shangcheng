<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class seller_detail extends Model
{
    protected $table = 'seller_detail';
    //设置主键
    protected $primaryKey = 'sdid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
