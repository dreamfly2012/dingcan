<?php

/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2014/12/1
 * Time: 13:16
 */

namespace Admin\Controller;

class CategoryController extends CommonController
{
    
    public function index() {
        $this->categoryList();
    }
    
    public function categoryList() {
        $this->display('category_list');
    }
    
    //加载类别
    public function loadCategory() {
        $store_id = session('store_id');
        $childcategory = $this->getChildCategory(0);
        echo json_encode($childcategory);
    }
    
    //获得所有子类别
    public function getChildCategory($parent) {
        $c = D('Category');
        
        $children = $c->getChildCategory($parent);
        if ($children) {
            foreach ($children as $k => $v) {
                $children[$k]["children"] = $this->getChildCategory($v["cat_id"]);
                $children[$k]["label"] = $v["cat_name"];
                $children[$k]["id"] = $v["cat_id"];
                $children[$k]['sort_order'] = $v["sort_order"];
            }
        }
        
        return $children;
    }
    
    //添加分类
    public function addCategory($info, $parent_id) {
        $c = D('Category');
        $result = true;
        foreach ($info as $k => $v) {
            $data = array();
            $data['cat_id'] = $v->cat_id;
            $data['cat_name'] = $v->cat_name;
            $data['sort_order'] = $v->sort_order;
            $data['parent_id'] = $parent_id;
            
            if (!$c->add($data)) {
                $result = false;
            }
            if (isset($v->children)) {
                $this->addCategory($v->children, $v->cat_id);
            }
        }
        
        return $result;
    }
    
    //ajax save category
    //所有商铺只有一个商品分类树
    
    public function updateCategory() {
        $category = I('post.category', null, 'json_decode');
        
        $c = D('Category');
        
        $tablePrefix = C('DB_PREFIX');
        
        //删除原树，添加新的数据
        $c->query('truncate table ' . $tablePrefix . 'category');
        
        if ($this->addCategory($category, 0)) {
            echo "true";
        } 
        else {
            echo "false";
        }
    }
}
