<?php

    function now_date($str){
        if(empty($str)){
            return date('Y-m-d');
        }else{
            return date('Y-m-d H:i:s',$str);
        }
    }

    function get_shipping_name_by_id($id){
        $s = D('Shipping');
        $shipping_name = $s->getShippingNameById($id);
        return $shipping_name;
    }

    function get_pay_method_by_id($id){
        $p = D('Payment');
        $payment_info = $p->getPaymentInfoById($id);
        return $payment_info['pay_name'];
    }