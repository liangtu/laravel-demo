<?php
namespace App\Modules\Online\Hotel\Http\Logics;
use App\Models\Hotel\HotelBase;

class HotelLogic
{
    public  function run()
    {
        $hotel= new HotelBase() ;
        $a = $hotel->take(1)->get();
        var_dump( $a->toArray());
       echo '处理逻辑';
    }
}