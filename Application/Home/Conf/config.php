<?php

//系统配置
$systemConfig =  array(
    //'配置项'=>'配置值'
    'TMPL_PARSE_STRING'=>array(
        '__UPLOADS__'=>'/Uploads',
    ),
    'KEEP_COOKIE_TIME'=>'60*60*24',

);

//TODO:淘宝账号配置,需要保存到数据库
$aliPayConfig = array(
    'aliPayConfig' => array(
        'partner' =>'2088402894270141',
        'key'=>'phj5ecsel8s73afva50tstjpuhkw7upg',
        'sign_type'=>strtoupper('MD5'),
        'input_charset'=> strtolower('utf-8'),
        'transport'=> 'http',
        'seller_email'=>'2380909990@qq.com',
        'notify_url'=> U('Pay/notifyUrl'),//'http://www.jsshop.com/Pay/notifyUrl',
        'return_url'=> U('Pay/returnUrl')//'http://www.jsshop.com/Pay/returnUrl'
    )
);


return array_merge($systemConfig, $aliPayConfig);