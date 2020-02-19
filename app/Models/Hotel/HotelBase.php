<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelBase extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'cl_hotel_base';

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;
}
