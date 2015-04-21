<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2014/12/23
 * Time: 16:44
 */

namespace Admin\Controller;

class CommentController extends CommonController{
    //增删改查
  

    public function index(){
        $this->commentList();
    }

    //添加匿名评论，user_id = 0;
    public function commentAdd(){
    	$comment_ranks = array();
    	for($i=1;$i<=5;$i++){
    		$comment_ranks[$i]['value'] = $i;
    	}
    	$g = D('Goods');
    	$goods_list = $g->getAllGoods();
    	$this->assign('goods_list',$goods_list);
    	$this->assign('comment_ranks',$comment_ranks);
    	$this->display('comment_add');
    }

    public function addComment(){
    	$c = D('Comment');
    	$data['content'] = I('request.content',null);
    	$data['comment_rank'] = I('request.comment_rank',null);
    	$data['user_id'] = 0;
    	$data['add_time'] = time();
    	$data['user_name'] = '匿名用户';
    	$data['store_id'] = session('store_id');
    	$data['goods_id'] = I('request.goods_id');
    	if($c->add($data)!=false){
    		$this->success('添加匿名评论成功');
    	}else{
    		$this->error('添加匿名评论失败');
    	}
    }




    public function commentList(){
        $this->display('Comment/comment_list');
    }
}