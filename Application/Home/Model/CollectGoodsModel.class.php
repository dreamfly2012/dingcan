<?php

namespace  Home\Model;

use Think\Model;

class CollectGoodsModel extends Model{
	public function deleteCollcet($data){
		$result = $this->where(array('user_id'=>$data['user_id'],'goods_id'=>$data['goods_id']))->delete();
		return $result; 
	}
}