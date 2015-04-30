<?php
namespace Home\Controller;

class OrderController extends CommonController
{
    public function payOrder() {
        $this->display('Order/pay_order');
    }
    
    //checkout
    public function checkOut() {
        
        if (!$this->checkLogin()) {
            $this->error('非法操作');
        } 
        else {
            $c = D('Cart');
            $user_id = session('user_id');
            $cart_info = $c->getAllInfoByUserId($user_id);
            
            if (empty($cart_info)) {
                $this->error(C('ERROR_CART_EMPTY'));
            } 
            else {
                
                //TODO:赋值 购物车信息,地址信息,付款方式.
                $ua = D('UserAddress');
                $p = D('Payment');
                $r = D('Region');
                
                //地址信息从数据库选择
                $address_info = $ua->getDefaultAddress($user_id);
                if (empty($address_info)) {
                    $provinces = $r->getInfoByTypeAndParent('1', 1);
                    $this->assign('provinces', $provinces);
                    $this->display('consignee_address');
                } 
                else {
                    $provinces = $r->getInfoByTypeAndParent('1', 1);
                    $payment_info = $p->getAllInfo();
                    $this->assign('provinces', $provinces);
                    $this->assign('cart_info', $cart_info);
                    $this->assign('address_info', $address_info);
                    $this->assign('payment_info', $payment_info);
                    $this->display('delivery');
                }
            }
        }
    }
    
    public function delivery() {
        $c = D('Cart');
        $user_id = session('user_id');
        $cart_info = $c->getAllInfoByUserId($user_id);
        $consigneeM = D('Consignee');
        $address_info = $consigneeM->getDefaultAddress($user_id);
        $p = D('Payment');
        $r = D('Region');
        
        //地址信息从数据库选择
        $provinces = $r->getInfoByTypeAndParent('1', 1);
        $payment_info = $p->getAllInfo();
        dump($address_info);
        $this->assign('provinces', $provinces);
        $this->assign('cart_info', $cart_info);
        $this->assign('address_info', $address_info);
        $this->assign('payment_info', $payment_info);
        $this->display('delivery');
    }
    
    public function orderHandle($data) {
        if ($data['order_status'] == OS_UNCONFIRMED) {
            $orderURL = U('Order/cancelOrder', array('order_id' => $data['order_id']));
            $handler = "<a href='" . $orderURL . "' onclick='if (!confirm('" . C('LABEL_CONFIRM_CANCEL') . "')) return false;\">" . C('LABEL_CANCEL_ORDER') . "</a>";
        } 
        else if ($data['order_status'] == OS_SPLITED) {
            
            /* 对配送状态的处理 */
            
            if ($data['shipping_status'] == SS_SHIPPED) {
            	$receiveURL = U('Order/receiveOrder');
				@$handler = "<a href='" . $receiveURL . "' onclick='if (!confirm('" . C('LABEL_CONFIRM_RECEIVE') . "')) return false;\">" . C('LABEL_RECEIVE_ORDER'). "</a>";
            } 
            elseif ($data['shipping_status'] == SS_RECEIVED) {
                @$handler = '<span style="color:red">' . C('LABEL_HAVE_RECEIVED') . '</span>';
            } 
            else {
                if ($data['pay_status'] == PS_UNPAYED) {
                    $payURL = U('Order/payOrder', array('order_id' => $data['order_id']));
                    @$handler = "<a href='" . $payURL . "'>" . C('LABEL_PAY_MONEY') . "</a>";
                } 
                else {
                    $watchorderURL = U('Order/watchOrder', array('order_id' => $data['order_id']));
                    @$handler = "<a href='" . $watchorderURL . "'>" . C('LABEL_VIEW_ORDER') . '</a>';
                }
            }
        } 
        else {
            $handler = '<span style="color:red">' . C('LABEL_ORDER_STATUS'). '</span>';
        }
        return $handler;

    }
}
