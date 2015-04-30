<?php
namespace Home\Controller;

class UserController extends CommonController
{
    public function index() {
        
        //个人中心首页
        if (!$this->checkLogin()) {
            $this->redirect('Login/index');
        } 
        else {
            $u = D('User');
            $user_id = session('user_id');
            $user_info = $u->getInfoByUserId($user_id);
            $this->assign('user_info', $user_info);
            $this->display('index');
        }
    }
    
    public function profileSetting() {
        if (!$this->checkLogin()) {
            $this->redirect('Login/index');
        } 
        else {
            $u = D('User');
            $user_id = session('user_id');
            $user_info = $u->getInfoByUserId($user_id);
            $this->assign('user_info', $user_info);
            $this->display('profile');
        }
    }
    
    public function saveProfile() {
        $u = D('User');
        $data = I('post.');
        $data['user_id'] = session('user_id');
        if ($u->save($data) !== false) {
            $this->success(C('SUCCESS_UPDATE_USERINFO'));
        } 
        else {
            $this->error(C('INVILID_OPERATE'));
        }
    }
    
    public function passwordSetting() {
        if (!$this->checkLogin()) {
            $this->redirect('Login/index');
        } 
        else {
            $this->display('passwordform');
        }
    }
    
    public function savePassword() {
        $oldpassword = I('request.oldpassword', null, 'md5');
        $data['password'] = I('post.password', null, 'md5');
        
        $u = D('User');
        
        $user_id = session('user_id');
        
        $rules = array(array('password', 'require', '原密码不能为空'), array('password', 'require', '新密码不能为空'), array('rpassword', 'require', '确认密码不能为空'), array('password', 'rpassword', '两次密码不一致', 0, 'confirm'),);
        
        if (!$u->validate($rules)->create()) {
            $this->error($u->getError());
        } 
        else {
            $user_info = $u->getInfoByUserId($user_id);
            $user_password = $user_info['password'];
            if ($oldpassword !== $user_password) {
                $this->error('原密码错误！');
            } 
            else {
                $data['user_id'] = $user_id;
                if ($u->save($data) !== false) {
                    $this->success('修改密码成功');
                } 
                else {
                    $this->error('修改密码失败');
                }
            }
        }
    }
    
    public function orderlistSetting() {
        if (!$this->checkLogin()) {
            $this->redirect('Login/index');
        } 
        else {
            $user_id = session('user_id');
            $orderinfoM = D('OrderInfo');
            $orderinfo = $orderinfoM->where(array('user_id'=>$user_id))->select();
            foreach($orderinfo as $k=>$v){
                $orderinfo[$k]['handler'] = R('Order/orderHandle',$data);
            }
            $this->assign('orderinfo',$orderinfo);
            $this->display('orderlist');
        }
    }
    
    public function addresslistSetting() {
        if (!$this->checkLogin()) {
            $this->redirect('Login/index');
        } 
        else {
            $this->display('addresslist');
        }
    }
    
    public function collectionlistSetting() {
        if (!$this->checkLogin()) {
            $this->error(C('ERROR_NO_LOGIN'), U('Login/index'));
        } 
        else {
            $user_id = session('user_id');
            $collectgoodsM = M();

            $collections = $collectgoodsM->table(
                    array(
                        C('DB_PREFIX').'collect_goods'=>'collect_goods',
                        C('DB_PREFIX').'goods'=>'goods'
                    )
              )
            ->where('collect_goods.goods_id = goods.goods_id and collect_goods.user_id = "' . $user_id .'"')
            ->field('goods.goods_id,goods.goods_name,goods.shop_price')
            ->order('collect_goods.add_time')
            ->select();
            $this->assign('collections',$collections);
            $this->display('collectionlist');
        }
    }

    public function delAjaxCollcetGoods(){
        $goods_id = I('post.goods_id');
        $cg = D('CollectGoods');
        $data['goods_id'] = $goods_id;
        $data['user_id'] = session('user_id');
        if($cg->deleteCollcet($data)){
            $this->ajaxReturn(array('info'=>1));
        }else{
            $this->ajaxReturn(array('info'=>0));
        }
    }
    
    public function commentlistSetting() {
        if (!$this->checkLogin()) {
            $this->error(C('ERROR_NO_LOGIN'), U('Login/index'));
        } 
        else {
            $this->display('commentlist');
        }
    }
    
    public function accountSetting() {
        if (!$this->checkLogin()) {
            $this->error(C('ERROR_NO_LOGIN'), U('Login/index'));
        } 
        else {
            $this->display('account');
        }
    }
    
    public function exchangeSetting() {
        if (!$this->checkLogin()) {
            $this->error(C('ERROR_NO_LOGIN'), U('Login/index'));
        } 
        else {
            $this->display('exchange');
        }
    }
    
    public function couponExchange() {
        if (!$this->checkLogin()) {
            $this->error(C('ERROR_NO_LOGIN'), U('Login/index'));
        }
        $c = D('Coupon');
        $u = D('User');
        $user_id = session('user_id');
        $coupon_code = I('post.coupon_code', null);
        $coupon_pwd = I('post.coupon_pwd', null);
        if (!$c->create()) {
            $this->error($c->getError());
        } 
        else {
            $code_info = $c->getInfoByCoupon($coupon_code, $coupon_pwd);
            if (empty($code)) {
                $this->error(C('ERROR_COUPON'));
            } 
            else {
                $code_status = $code_info['status'];
                if ($code_status) {
                    $u->where(array('user_id' => $user_id))->setInc('pay_points', $code_info['pay_points']);
                    $this->success('兑换券兑换成功');
                } 
                else {
                    $this->error('兑换券失效了');
                }
            }
        }
    }
    
    public function addGoodsToCollect() {
        
        //添加商品到收藏
        $data['info'] = '0';
        $data['message'] = 'unlogin';
        if (!$this->checkLogin()) {
            $this->ajaxReturn($data);
        } 
        else {
            $goods_id = I('request.goods_id', null, 'intval');
            $user_id = session('user_id');
            $cg = M('CollectGoods');
            $condition['user_id'] = $user_id;
            $condition['goods_id'] = $goods_id;
            $count = $cg->where($condition)->count();
            if ($count) {
                $data['info'] = 1;
                
                //已经收藏过;
                $data['message'] = 'success';
            } 
            else {
                
                //添加收藏
                $condition['add_time'] = time();
                if ($cg->add($condition) !== false) {
                    $data['info'] = 2;
                    
                    //成功添加收藏;
                    $data['message'] = 'success';
                } 
                else {
                    $data['info'] = 3;
                    
                    //添加收藏失败;
                    $data['message'] = 'error';
                }
            }
            $this->ajaxReturn($data);
        }
    }
    
    public function addStoreToCollect() {
        
        //添加商店到收藏
        $data['info'] = '0';
        $data['message'] = 'unlogin';
        if (!$this->checkLogin()) {
            $this->ajaxReturn($data);
        } 
        else {
            $store_id = I('request.store_id', null, 'intval');
            $user_id = session('user_id');
            $cs = M('CollectStore');
            $condition['user_id'] = $user_id;
            $condition['store_id'] = $store_id;
            $count = $cs->where($condition)->count();
            if ($count) {
                $data['info'] = 1;
                
                //已经收藏过;
                $data['message'] = 'success';
            } 
            else {
                
                //添加收藏
                $condition['add_time'] = time();
                if ($cs->add($condition) !== false) {
                    $data['info'] = 2;
                    
                    //成功添加收藏;
                    $data['message'] = 'success';
                } 
                else {
                    $data['info'] = 3;
                    
                    //添加收藏失败;
                    $data['message'] = 'error';
                }
            }
            $this->ajaxReturn($data);
        }
    }
}
