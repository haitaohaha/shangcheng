<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class links extends Model
{
    protected $table = 'links';
    //设置主键
    protected $primaryKey = 'lid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
