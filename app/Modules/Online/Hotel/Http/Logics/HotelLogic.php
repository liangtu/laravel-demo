<?php
namespace App\Modules\Online\Hotel\Http\Logics;
use App\Models\Hotel\HotelBase;

class HotelLogic
{
    public  function run()
    {
        echo '处理逻辑';
        echo '<br>';
        echo '数据交互';
        echo '<br>';
        $hotel= new HotelBase() ;
        $a = $hotel->take(1)->get();
        var_dump( $a->toArray());

    }
}