<?php

namespace Home\Controller;

class UserController extends CommonController{
	public function index(){
		//个人中心首页
		$this->display('index');
	}

    public function profileSetting()
    {
        $this->assign('profile');
    }

    public function orderlistSetting()
    {
        $this->assign('orderlist');
    }

    public function addresslistSetting()
    {
        $this->assign('addresslist');
    }

    public function collectionlistSetting()
    {
        $this->assign('collectionlist');
    }

    public function commentlistSetting()
    {
        $this->assign('commentlist');
    }

    public function accountSetting()
    {
        $this->assign('account');
    }

    public function

	

	public function addGoodsToCollect(){
		//添加商品到收藏
		$data['info'] = '0';
		$data['message'] = 'unlogin';
		if(!$this->checkLogin()){
			$this->ajaxReturn($data);
		}else{
			$goods_id = I('request.goods_id',null,'intval');
			$user_id = session('user_id');
			$cg = M('CollectGoods');
			$condition['user_id'] = $user_id;
			$condition['goods_id'] = $goods_id;
			$count = $cg->where($condition)->count();
			if($count){
				$data['info'] = 1;//已经收藏过;
				$data['message'] = 'success';
			}else{
				//添加收藏
				$condition['add_time'] = time();
				if($cg->add($condition)!==false){
					$data['info'] = 2;//成功添加收藏;
					$data['message'] = 'success';
				}else{
					$data['info'] = 3;//添加收藏失败;
					$data['message'] = 'error';
				}
			}
			$this->ajaxReturn($data);
		}
	}

	public function addStoreToCollect(){
		//添加商店到收藏
		$data['info'] = '0';
		$data['message'] = 'unlogin';
		if(!$this->checkLogin()){
			$this->ajaxReturn($data);
		}else{
			$store_id = I('request.store_id',null,'intval');
			$user_id = session('user_id');
			$cs = M('CollectStore');
			$condition['user_id'] = $user_id;
			$condition['store_id'] = $store_id;
			$count = $cs->where($condition)->count();
			if($count){
				$data['info'] = 1;//已经收藏过;
				$data['message'] = 'success';
			}else{
				//添加收藏
				$condition['add_time'] = time();
				if($cs->add($condition)!==false){
					$data['info'] = 2;//成功添加收藏;
					$data['message'] = 'success';
				}else{
					$data['info'] = 3;//添加收藏失败;
					$data['message'] = 'error';
				}
			}
			$this->ajaxReturn($data);
		}
	}
}