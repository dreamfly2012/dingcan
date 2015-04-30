<?php

namespace Home\Model;

class CartModel extends CommonModel
{
	public function getAllInfoByUserId($user_id)
	{
		$result = $this->where(array('user_id'=>$user_id))->select();
		return $result;
	}
}