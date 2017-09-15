<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    protected $table = 'seller';
    //设置主键
    protected $primaryKey = 'sid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
