<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    //
    protected $table = 'service';
    //设置主键
    protected $primaryKey = 'wid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
