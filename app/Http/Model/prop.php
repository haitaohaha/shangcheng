<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class prop extends Model
{
    protected $table = 'prop';
    //设置主键
    protected $primaryKey = 'proid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
