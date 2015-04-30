<?php

namespace Home\Controller;

class CartController extends CommonController{
	public function index(){
		$this->showCart();
	}

	public function showCart(){
		if(!$this->checkLogin()){
			$this->redirect('Login/index');
		}else{
			$c = D('Cart');
			$user_id = session('user_id');
			$goods_list = $c->getAllInfoByUserId($user_id);
			foreach($goods_list as $k=>$v){
				$goods_list[$k]['sub_total_price'] = $v['goods_price']*$v['goods_number'];
			}
			$this->assign('goods_list',$goods_list);
			$this->display('Cart/shopping_cart');
		}
		
	}

	//更新购物车 rec_id TODO:库存考虑
	public function updateCart(){
		if(!$this->checkLogin())
		{
			$this->error(C('ERROR_NO_LOGIN'));
		}
		else
		{
			$g = M('Goods');
			
			$quantity = I('request.quantity',null);
			
			$user_id = session('user_id');
			$c = D('Cart');
			foreach($quantity as $k=>$v){
				$goods_info = $g->field('goods_number')->where(array('goods_id'=>$k))->select();
				$goods_number = $goods_info[0]['goods_number'];
				if($goods_number<$v){
					$this->error(C('ERROR_GOODS_NUMBER'));
				}else{
					$c->where(array('goods_id'=>$k,'user_id'=>$user_id))->setField('goods_number',$v);
				}
			}

			$this->success(C('SUCCESS_UPDATE_CART'));
			
		}
	}

	//ajax删除购物车商品
	public function deleteGoods()
    {
		$c = D('Cart');
		$condition['goods_id'] = I('request.goods_id',null,'intval');
        $condition['user_id'] = session('user_id');
        $status = $c->where(array($condition))->delete();
        if($status)
        {
			$data['info'] = 1;
			$data['message'] = 'success';
		}
        else
        {
			$data['info'] = 0;
			$data['message'] = 'error';
		}
		$this->ajaxReturn($data);
	}

	//ajax清空购物车
	function emptyCart()
    {
		$c = D('Cart');
		$condition['user_id'] = session('user_id');

        $status = $this->where($condition)->delete();
        if($status)
        {
			$data['info'] = 1;
			$data['message'] = 'success';
		}
        else
        {
			$data['info'] = 0;
			$data['message'] = 'error';
		}
		$this->ajaxReturn($data);
	}

	//购物券兑换积分
	function couponChange()
    {
        if(!$this->checkLogin())
        {
        	$this->error(C('ERROR_NO_LOGIN'));
        }

        $coupon_code = I('post.coupon_code',null);

        $user_id = session('user_id');

        if(empty($coupon_code))
        {
			$this->error(C('EMPTY_COUPON'));
		}

		$c = D('Coupon');
		$u = D('User');

		$coupon_info = $c->where($coupon_code)->find();

		if(empty($coupon_info))
		{
			$this->error(C('ERROR_COUPON_CODE'));
		}
		else
		{
			$pay_points = $coupon_info['pay_points'];
			$u->where(array('user_id'=>$user_id))->setInc('pay_points',$pay_points);
			$this->success(C('SUCCESS_COUPON_EXCHANGE'));
		}

	}

	//添加到购物车
	public function addToCart(){
		$goods_number = I('request.quantity',null,'intval');
		if(!$this->checkLogin())
        {
        	$this->error(C('ERROR_NO_LOGIN'),U('Login/index'));
        }
     
		if($goods_number<0){
			$this->error(C('INVILID_OPERATE'));
		}else{
			$goods_id = I('request.goods_id',null,'intval');
			$user_id = session('user_id');
			$condition['goods_id'] = $goods_id;
			$condition['user_id'] = $user_id;
			$c = D('Cart');
			$count = $c->where($condition)->count();
			if($count){
				$c->where($condition)->setInc('goods_number',$goods_number);
				//已经存在,进行添加更新操作
				$this->showCart();
			}else{
				$g = D('Goods');
				$info = $g->getGoodsById($goods_id);

				$condition['goods_sn'] = $info['goods_sn'];
				$condition['product_id'] = empty($info['product_id']) ? 0 : $info['product_id'];
				$condition['goods_name'] = $info['goods_name'];
				$condition['market_price'] = empty($info['market_price']) ? 0 : $info['market_price'];
				$condition['goods_price'] = R('Goods/getGoodsPrice',array($goods_id));
				$condition['goods_number'] = $goods_number;

				if($c->add($condition)!==false){
					$this->showCart();
				}else{
					$this->error($c->getError());
				}
			}
		}
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
