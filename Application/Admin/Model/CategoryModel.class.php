<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2014/12/1
 * Time: 13:13
 */

namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model{
    public function getChildCategory($parent){
        $children = $this->field('cat_id,cat_name,sort_order')->where(array('parent_id'=>$parent))->order('sort_order asc')->select();
        return $children;
    }

    public function hasParent(){
        $result = $this->field('cat_id,cat_name')->where(array('parent_id'=>$_self))->select();
        return $result;
    }

    public function deleteAllInfo(){
    	$result = $this->where('1')->delete();
    	return $result;
    }
}