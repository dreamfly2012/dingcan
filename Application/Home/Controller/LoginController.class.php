<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/4/16
 * Time: 10:07
 */

class LoginController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    //登录首页
    public function index()
    {
        $this->display('index');
    }

    //登录处理
    public function loginHandle()
    {
        $data["user_name"]  = I('post.user_name',null);
        $data["password"] = I('post.password',null,'md5');
        $u = D('User');

        if(!$u->create($data))
        {
            $this->error($u->getError());
        }

        $user = $u->checkLogin($data);

        if(!is_null($user))
        {
            cookie('user_name', $data['user_name'], C('KEEP_COOKIE_TIME'));
            Cookie::set('user_id', $info['id'], 60*60*24);
            Cookie::set('feifa_home', 'passageway_home', 60*60*24);
            Cookie::set('cart_num', $info['cart_num'], 60*60*24);

            if(Cookie::get('user_name'))
            {
                $this->assign('jumpUrl', U('Myapp://index/index'));
                $this->assign('waitSecond', 3);
                $this->success(C('SUCCESS_LOGIN_SUCCESS'));
            }
            else
            {
                $this->error(C('ERROR_LOGIN_FAILURE'));
            }
        }
        else
        {
            $this->error(C('ERROR_ACCOUNT_OR_PASSWORD_ERROR'));
        }

    }


    //忘记密码页面
    function forget_password()
    {
        $this->display('forget_pass');
    }

    //忘记密码处理
    function forget_password_handle()
    {
        $username = trim($_POST['username']);
        if(!preg_match('/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/', $username))
        {
            $this->error('输入的用户名非法');
        }

        $email = trim($_POST['email']);
        if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $email))
        {
            $this->error('邮箱非法');
        }

        $condition['username'] = array('eq', $this->zaddslashes($username));
        $condition['email'] = array('eq', $this->zaddslashes($email));
        $condition['_logic'] = 'and';
        $result = $this->loginModel->forgetPassword($condition);

        if(!empty($result))
        {
            $email = $condition['email'];
            $title = 'Kshop数码密码更改邮件 ！';
            $content = '<div>';
            $content .= sprintf('Dear %s，您忘记密码了吗？<br>', $result['info']['username']);
            $content .= '为了保险起见，我们将您的密码更新成新密码，看到新密码后，您可以立即登陆会员中心修改密码。<br>';
            $content .= sprintf('您的个人信息请妥善保管个人注册信息<br>用户名：%s<br>新密码：%s<br>', $result['info']['username'], $result['new_pass']);
            $content .= '■重要信息：由于此邮件包含个人注册资料，请妥善保存!</div>';

            $email = $this->SendMail($email, $title, $content);
            if(isset($email))
            {
                $this->assign('waitSecond', 3);
                $this->success(C('SUCCESS_PASSWORD_SEND_EMAIL'));
            }
            else
            {
                $this->error(C('ERROR_PASSWORD_FAILURE'));
            }
        }
        else
        {
            $this->error(C('ERROR_ACCOUNT_OR_EMAIL_ERROR'));
        }

    }

    //退出
    public function loginout()
    {
        //清除session,cookie
        session('user_id',null);
        cookie('user_id',null);
        $this->redirect('Index');
    }

    //

}