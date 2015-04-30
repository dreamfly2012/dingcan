<?php
namespace Home\Model;

class CouponModel extends CommonModel
{
    protected $_validate = array(array('coupon_code', 'require', '兑换码必须填写'),);
    
    public function getInfoByCoupon($coupon_code, $coupon_pwd) {
        $result = $this->where(array('coupon_code' => $coupon_code, 'coupon_pwd' => $coupon_pwd))->select();
        return $result[0];
    }
}
