<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/1/14
 * Time: 15:44
 */
namespace Home\Model;
use Think\Model;

class CategoryModel extends CommonModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCatNameById($id){
        $condition['cat_id'] = $id;
        $result = $this->field('cat_name')->where($condition)->select();
        return $result[0]['cat_name'];
    }

    public function getChildCategory($parent){
        $children = $this->field('cat_id,cat_name,sort_order')->where(array('parent_id'=>$parent))->order('sort_order asc')->select();
        return $children;
    }

    public function getAllCategory(){
        $result = $this->select();
        return $result; 
    }

    public function getInfoByCatId(){
        $result = $this->where(array('cat_id'=>$cat_id))->select();
        return $result[0];
    }
}