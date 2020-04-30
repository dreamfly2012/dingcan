<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/1/8
 * Time: 11:39
 */

class ArticleModel extends Model{
    protected $_validate = array(
        array('title','require','文章标题不能为空'),
        array('content','require','文章内容不能为空'),
        array('publish_time','require','发布时间不能为空'),
        array('category','require','文章类别不能为空'),
    );

    public function getInfoById($id){
        $result = $this->where(array('id'=>$id))->select();
        return $result[0];
    }

    public function getAllInfo(){
        $result = $this->select();
        return $result;
    }

    public function deleteArticleById($id){
        $result = $this->where(array('id'=>$id))->delete();
        return $result;
    }
}