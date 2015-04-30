<?php

namespace Home\Model;

class CommentModel extends CommonModel{
	public function getCommentsByGoodsId($goods_id)
    {
        $result = $this->where(array('goods_id'=>$goods_id))->order('add_time desc')->select();
        return $result;
    }
}