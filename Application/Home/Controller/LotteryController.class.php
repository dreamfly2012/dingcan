<?php
namespace Home\Controller;

class LotteryController extends CommonController
{
    private $num = 16;
    //有多少个奖项，包括未中奖项

    private $cost_points = 20;
    //消耗积分

    //本次抽奖的奖项信息，必须按照从大到小的顺序进行填写，id为奖次，prize为中奖信息,v为中奖概率,num为奖品数量
    //需要注意的是，该处也必须包含不中奖的信息，概率从小到大进行排序


    public function index()
    {
        $this->display('index');
    }

    public function randomInit()
    {
        $this->generateAward();
    }

    /**
     * 生成中奖信息，ajax进行请求该方法，需要客户填写QQ号码
     */
    public function generateAward()
    {
        $user_id = session('user_id');
        $data['num'] = $this->num;
        $data['islogin'] = is_null($user_id) ? 0 : 1;
        $data['haspoints'] = 0;
        $data['prize'] = 0;
        $data['message'] = '';
        $u = D('User');
        $pay_points = $u->getPaypoints($user_id);



        if($data['islogin']==0)
        {
            $data['message'] = '请先登陆';
            $this->ajaxReturn($data);
        }

        if($pay_points<$this->cost_points)
        {
            $data['islogin'] = 1;
            $this->ajaxReturn($data);
        }

        $u->where(array('user_id'=>$user_id))->setDec('pay_points',$this->cost_points);

        //获取奖项信息数组，来源于私有成员
        $lotteryM = M('Lottery');
        $prize_info = $lotteryM->select();

        foreach ($prize_info as $key => $val) {
            $arr[$val['id']] = $val['prize_chance'];
        }

        //$rid中奖的序列号码
        $rid = $this->get_rand($arr);
        $data['haspoints'] = 1;

        $data['num'] = $lotteryM->count();
        $data['message'] = $prize_info[$rid]['prize_info'];
        $this->ajaxReturn($data);

    }


    private function get_rand($proArr)
    {
        $result = '';

        //概率数组的总概率精度
        $proSum = array_sum($proArr);

        //概率数组循环
        foreach ($proArr as $key => $proCur) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        unset($proArr);
        return $result;
    }
}
    