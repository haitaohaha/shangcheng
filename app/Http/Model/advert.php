<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class advert extends Model
{
    //
    //关联数据表
    protected $table = 'advert';
    //设置主键
    protected $primaryKey = 'arid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
