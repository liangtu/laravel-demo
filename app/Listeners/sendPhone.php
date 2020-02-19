<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendPhone
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        //$user = $event->user; // @todo: 当前用户
        //@todo：发送消息模板逻辑
        dump('发送短息成功');
    }
}
