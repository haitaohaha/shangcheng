<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class problem extends Model
{
    protected $table = 'problem';
    //设置主键
    protected $primaryKey = 'prid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
