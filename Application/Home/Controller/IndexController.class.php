<?php
/**
 * @author dreamfly	
 * @version 0.2
 */
namespace Home\Controller;

class IndexController extends CommonController
{
    public function index() {
        //调用Brand控制器的赋值品牌方法.
        //
        $is_main = I('request.store_id','0','intval');
        if($is_main==0){
        	//TODO:品牌赋值
        	//R('Brand/assignIndexBrand');
        
	        //调用Goods控制器的赋值商品方法
	        R('Goods/assignIndexGoods');
	        
	        $this->display('Index/index');
        }else{
        	R('Brand/assignBrand', array($this->store_id));
        
	        //调用Goods控制器的赋值商品方法
	        R('Goods/assignGoods', array($this->store_id));
	        
	        $this->display('Index/single_index');
        }
        
    }
}
