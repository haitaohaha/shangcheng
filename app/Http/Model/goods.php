<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    protected $table = 'goods';
    //设置主键
    protected $primaryKey = 'gid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
