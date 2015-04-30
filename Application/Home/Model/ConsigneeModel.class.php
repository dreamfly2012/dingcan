<?php

namespace Home\Model;

class ConsigneeModel extends CommonModel
{
    public function getDefaultAddress($user_id)
    {
        $result = $this->where(array('user_id'=>$user_id))->count();

        if($result==0)
        {
            return $result;
        }
        else if($result==1)
        {
            $this->where(array('user_id'=>$user_id))->setField(array('is_default'=>1));
            return $result[0];
        }
        else
        {
            $result2 = $this->where(array('user_id'=>$user_id,'is_default'=>1))->select();
            if(empty($result2))
            {
                return $result;
            }
            else
            {
                return $result2;
            }
        }
    }
}