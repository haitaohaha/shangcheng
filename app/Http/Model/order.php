<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    //设置主键
    protected $primaryKey = 'oid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
 