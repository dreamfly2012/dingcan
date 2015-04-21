<?php

namespace Home\Controller;


use Think\Controller;

/**
 * Class CommonController
 * @package Home\Controller
 */
class CommonController extends Controller{
    private $role;
    private $privilege;
    protected $store_id;

    public function __construct(){
        parent::__construct();
        header("Content-type: text/html; charset=utf-8");
        
        $this->store_id = I('request.store_id','1','intval');
        $storeConfigM = D('StoreConfig');
        $storeConfig = $storeConfigM->getAllInfoByStoreId($this->store_id);

        $store_config = array();
        foreach($storeConfig as $key=>$val)
        {
            $store_config[$val['key']]  = $val['value'];
        }

        $this->assign('store_config',$store_config);

        //导航赋值
        R('Nav/assignNav',array($this->store_id));
    }

    //检查是否登录
    public function checkLogin(){
        if(is_null(session('user_id'))){
            return false;
        }else{
            return true;
        }
    }


    
    /**
     * @return mixed
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * @param mixed $privilege
     */
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


    protected function hasPrivilege(){
        $this->display("");
    }
}