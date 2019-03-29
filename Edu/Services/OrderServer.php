<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Services;

use App\Servers\PayServer;
use Modules\Edu\Entities\EduOrder;
use Modules\Edu\Entities\EduSubscribe;

/**
 * 创建定单
 * Class OrderServer
 * @package Modules\Edu\Services
 */
class OrderServer
{
    /**
     * 生成订阅订单
     * @param EduSubscribe $subscribe
     */
    public function subscribe(EduSubscribe $subscribe)
    {
        $payServer = app(PayServer::class);
        $eduOrder = EduOrder::create([
            'price' => $subscribe['price'],
            'subject' => $subscribe['title'],
            'sn' => $payServer->generateOrderSn(),
            'type' => $subscribe['subscribe'],
            'site_id' => \site()['id'],
            'user_id' => auth()->id(),
            'type' => "subscribe",
            'month' => $subscribe['month'],
            'module_id' => module()['id'],
        ]);
        $payServer->aliPay($eduOrder);
    }
}