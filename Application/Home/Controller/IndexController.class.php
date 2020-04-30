<?php
namespace Home\Controller;

use Think\Controller;
class IndexController extends Controller
{
    private $num = 16;
    //有多少个奖项，包括未中奖项

    private $cost_points = 20;
    //消耗积分

    //本次抽奖的奖项信息，必须按照从大到小的顺序进行填写，id为奖次，prize为中奖信息,v为中奖概率,num为奖品数量
    //需要注意的是，该处也必须包含不中奖的信息，概率从小到大进行排序


    public function index()
    {
        //设置cookie
        $this->display('index');
    }

    public function getUV(){
        $UV = M('Uv');

        $val = $UV->where(array('id'=>1))->getField('val');

        $UV->where(array('id'=>1))->setInc('val');

        echo $val;
    }

    public function getDetail(){
        $lingTime = strtotime('today');
        $loterylogM = D('LotteryLog');
        $data['add_time'] = array('gt',$lingTime);
        $info = $loterylogM->where($data)->select();
        foreach($info as $key=>$val){
            $info[$key]['user_name'] = $this->getUserName($val['user_id']);
            $info[$key]['awards_title'] = $this->getAwardsTitle($val['awards']);
        }
        $this->ajaxReturn($info);
    }

    public function getUserName($uid){
        $userM = M('User');
        $user_name = $userM->where(array('uid'=>$uid))->getField('user_name');
        return $user_name;
    }

    public function getAwardsTitle($prize_id){
        $lotteryM = M('Lottery');
        $awards_title = $lotteryM->where(array('prize_id'=>$prize_id))->getField('prize_info');
        return $awards_title;
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
        $data['count'] = 0;
        
        $data['prize'] = 0;
        $data['message'] = '';

        $u = D('User');
        $loterylogM = M('LotteryLog'); 
       
        if($data['islogin']==0){
            $data['message'] = '请先登陆';
            $this->ajaxReturn($data);
        }


        $nowtime = time();

        $lingTime = strtotime("today")+24*60*60;
         
        $count = $loterylogM->where(array('user_id'=>$user_id))->count();

        if($count){
            $add_time = $loterylogM->where(array('user_id'=>$user_id))->order(array('add_time'=>'desc'))->limit(1)->getField('add_time');
            if($add_time<$lingTime){
                $data['count'] = 1;
                $this->ajaxReturn($data);
            }

        }
       
        //获取奖项信息数组，来源于私有成员
        $lotteryM = M('Lottery');
        $prize_info = $lotteryM->select();

        foreach ($prize_info as $key => $val) {
            $arr[$val['id']] = $val['prize_chance'];
        }

        //$rid中奖的序列号码
        $rid = $this->get_rand($arr);
        

        //插入抽奖结果记录
        
        $meta['user_id'] = $user_id;
        $meta['add_time'] = time();
        $meta['awards'] = $rid;
        $loterylogM->add($meta);

        $data['num'] = $lotteryM->count();
        $data['prize'] = $rid;
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
    