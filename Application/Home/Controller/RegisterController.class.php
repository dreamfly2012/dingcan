<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/4/16
 * Time: 10:44
 */

namespace Home\Controller;

class RegisterController extends CommonController {

    //登陆页面
    public function index()
    {
        $this->display('index');
    }

    //注册处理
    public function registerHandle()
    {
        $data['user_name'] = I('post.user_name',null);
        $data['password'] = I('post.password',null,'md5');
        $data['email'] = I('post.email',null);
        $data['telephone'] = I('post.telephone',null);
        $data['reg_time'] = time();
        $data['last_login'] = time();
        
        $u = D('User');
        if(!$u->create($data))
        {
            $this->error($u->getError());
        }
        
        if($user_id = $u->add($data))
        {
            session('user_id',$user_id);
            $this->success('注册成功！',U('Index/index'));
        }

    }

    public function checkUserName()
    {
        $user_name = I('request.user_name',null);
        $u = D('User');
        $count = $u->where(array('user_name'=>$user_name))->count();
        if($count>0){
            $this->ajaxReturn(false);
        }else{
            $this->ajaxReturn(true);
        }
    }

    public function checkEmail()
    {
        $email = I('request.email',null);
        $u = D('User');
        $count = $u->where(array('email'=>$email))->count();
        if($count>0){
            $this->ajaxReturn(false);
        }else{
            $this->ajaxReturn(true);
        }
    }

    public function check_captcha($captcha){
        $code = session('captcha');

        if($captcha==$code){
            return true;
        }else{
            return false;
        }
    }

    public function check_telephone(){
        $user = D('User');
        $telephone = I('post.telephone');
        if($user->IsExistPhone($telephone)){
            echo "false";
        }else{
            echo "true";
        }
    }

    /**
     * ajax 保存验证码，
     */
    public function send_captcha(){
        $telephone = I('post.telephone');
        if(preg_match('/^[1-9]\d{10}/',$telephone)){
            $code = $this->send_captcha_callback($telephone);

            if($code==-1){
                echo "false";
            }else{
                echo "true";
                session('captcha',$code);
            }
        }else{
            echo "false";
        }
    }

    /**
     * @param $telephone
     * @return int
     * 返回值为-1发送验证码失败，否则返回发送的验证码
     */
    public function send_captcha_callback($telephone){
        $http = new \Org\Net\HttpQuery;
        $rand = rand(111111,999999);
        $post_data = array(
            'Id' => C('BDT_Id'),
            'Name' => C('BDT_Name'),
            'Psw' => strtoupper(md5(C('BDT_Psw'))),
            'Message' => C('BDT_Message').$rand,
            'Phone' => $telephone,
            'Timestamp'=>0,
        );
        $json_result = $http->post(C('BDT_URL'), $post_data);

        #$temp = 'State:1,Id:3628109,FailPhone:';//发送成功，返回1.

        $split_str = explode(',',$json_result);

        $state_str = $split_str[0];

        $state = explode(':',$state_str);

        if($state[1]==1){
            return $rand;
        }else{
            return -1;
        }
    }
}
?>