<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/4/27
 * Time: 15:58
 */
namespace Home\Controller;

class LotteryController extends \Home\Controller\CommentController
{
    public function index()
    {
        $lotteryM = M('Lottery');
        $info = $lotteryM->select();
        $this->assign('info',$info);
        $this->display('index');
    }

    public function saveData()
    {
        $lotteryM = M('Lottery');
        $data = I('post.',null);
        if($lotteryM->save($data)!==false)
        {
            $this->success('修改数据成功');
        }
        else
        {
            $this->error('修改数据失败');
        }
    }
}