<?php

namespace Home\Controller;

class OrderController extends CommonController{
	public function payOrder(){
		$this->display('Order/pay_order');
	}

	public function checkout(){
		$this->display('Order/check_out');
	}

	public function delivery(){
		$this->display('Order/delivery');
	}
}