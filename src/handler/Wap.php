<?php
namespace TechOne\Alipay\handler;

/**
 * 手机网站支付
 * @author TechLee <liqiang1436@stnts.com>
 */
class Wap extends Base
{
    /**
     * 发起支付
     * @return void
     */
    public function execute()
    {
        $request = new \AlipayTradeWapPayRequest();
        //SDK已经封装掉了公共参数，这里只需要传入业务参数
        $request->setNotifyUrl($this->config('notify_url'));
        $request->setReturnUrl($this->config('return_url'));
        $request->setBizContent(json_encode($this->bizcontent));
        return $this->aop->pageExecute($request);
    }
}
