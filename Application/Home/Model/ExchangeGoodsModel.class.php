<?php
	
namespace Home\Model;
use Think\Model;

class ExchangeGoodsModel extends CommonModel{
	public function getAllGoods(){
		$result = $this->where(array('is_delete'=>0))->select();
        return $result;
	}
}