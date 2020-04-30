<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/1/8
 * Time: 11:40
 */

namespace Admin\Home;

use Think\Model;

class ArticleCatModel extends Model{
    protected $_validate = array(
        array('category_name','require','文章类别名称不能为空！'),
        array('category_name','','文章类别名称已经存在！',0,'unique',1),

    );

    public function getAllInfo(){
        $result = $this->select();
        return $result;
    }

    public function getInfoById($category_id){
        $result = $this->where(array('category_id'=>$category_id))->select();
        return $result[0];
    }

    public function getNameById($category_id){
        $result = $this->field('category_name')->where(array('category_id'=>$category_id))->select();
        return $result[0]['category_name'];
    }

    public function deleteCategoryById($category_id){
        $result = $this->where(array('category_id'=>$category_id))->delete();
        return $result;
    }
}