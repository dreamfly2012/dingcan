<?php

namespace Home\Controller;

use Think\Controller;

class CategoryController extends Controller{
	public function categoryList(){
		$cat_id = I('request.cat_id',null,'intval');
		$g = D('Goods');
		$goods_list = $g->getGoodsByCatId($cat_id);
		$this->assign('goods_list',$goods_list);
		$this->display('category_list');
	}

	public function assignNavCategory(){
		$c = D('Category');
		
		$category_info = $this->getChildCategory(0);
		
		$this->assign('nav_categories',$category_info);
	}

	public function assignBreadcrumb($store_id){
		$c = D('Category');
		$g = D('Goods');
		$goods_id = I('request.goods_id',null);
		$cat_id = $g->getCatIdByGoodsId($goods_id);
		$category_info = $c->getInfoByCatId($cat_id);
		$this->assign('breadcrumb',$category_info);
	}

	public function getChildCategory($parent)
    {
        $c = D('Category');
        $children = $c->getChildCategory($parent);
        if ($children) {
            foreach ($children as $k => $v) {
                $children[$k]["children"] = $this->getChildCategory($v["cat_id"]);
                $children[$k]["label"] = $v["cat_name"];
                $children[$k]["id"] = $v["cat_id"];
            }
        }
        return $children;
    }
}

