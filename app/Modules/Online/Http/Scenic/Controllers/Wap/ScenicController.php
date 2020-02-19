<?php

namespace App\Modules\Online\Http\Scenic\Controllers\Wap;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Services\Order\Test;
use App\Modules\Online\Http\Scenic\Logics\ScenicLogic;
use App\Modules\Online\Http\Scenic\Requests\Request as RequestCheck ;

use App\Events\OrderEvent;
class ScenicController extends Controller
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
        $check = new ScenicLogic();
        $check->run();

       //输出展示
        echo '<br>';
        echo '输出展示';
      //  return view('Scenic.pc.index');
        return view('online::Scenic.wap.index');

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('Scenic::create');
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
       $a =  config('url.Scenic_url');
       var_dump($a);
        var_dump(route ('Scenic.show'));
        echo 4444;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('Scenic::edit');
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

    public function createOrder()
    {
        echo '下单成功';

        //@todo:邮件通知逻辑
        //@todo:短信通知逻辑
        //@todo:等等....
        $user = 2222;
        event(new OrderEvent($user));
    }
}
