<?php

namespace App\Modules\Online\Hotel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Services\Order\Test;
use App\Modules\Online\Hotel\Http\Logics\HotelLogic;
use App\Modules\Online\Hotel\Http\Requests\Request as RequestCheck ;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
       // Test::test(); //测试公共业务逻辑

        $id = $request->input('id');
        //入参检验
        $ck =    new RequestCheck();
        $ck->check();
        echo '<br>';
        //处理逻辑
        $check = new HotelLogic();
        $check->run();
       //输出展示
        echo '<br>';
        echo '输出展示';
        return view('hotel::pc.index');

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hotel::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show()
    {
       $a =  config('url.hotel_url');
       var_dump($a);
        var_dump(route ('hotel.show'));
        echo 4444;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('hotel::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
