<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/4/16
 * Time: 13:46
 */

namespace Home\Model;
use Think\Model;

class StoreConfigModel extends Model
{
    public function getAllInfo()
    {
        $result = $this->select();
        return $result;
    }
}