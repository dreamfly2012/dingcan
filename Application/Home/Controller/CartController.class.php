<?php

namespace Home\Controller;

class CartController extends CommonController{
	public function showCart(){
		$this->display('Cart/shopping_cart');
	}

	public function updateCart(){
		//ajax 更新购物车 rec_id
		
	}


	//添加到购物车
	public function addToAjaxCart(){
		$data['info'] = '0';
		$data['message'] = 'unlogin';
		if(!$this->checkLogin()){
			$this->ajaxReturn($data);
		}else{
			$goods_id = I('request.goods_id',null,'intval');
			$user_id = session('user_id');
			$goods_num = I('request.goods_num',1,'intval');
			$condition['goods_id'] = $goods_id;
			$condition['user_id'] = $user_id;
			$c = M('Cart');
			$count = $c->where($condition)->count();
			if($count){
				$c->where($condition)->setInc('goods_number',$goods_num);
				//已经存在,进行添加更新操作
				$data['info'] = '1';
				$data['message'] = 'success';
			}else{
				$condition['goods_sn'] = $info['goods_sn'];
				$condition['product_id'] = $info['product_id'];
				$condition['goods_name'] = $info['goods_name'];
				$condition['market_price'] = $info['market_price'];
				$condition['goods_price'] = $info['goods_price'];
				$condition['goods_number'] = $goods_num;
				if($c->add($condition)!==false){
					$data['info'] = '2';//添加购物车成功
					$data['message'] = 'success';
				}else{
					$data['info'] = '3';
					$data['message'] = 'error';
				}
			}
			$this->ajaxReturn($data);
		}
	}
}
