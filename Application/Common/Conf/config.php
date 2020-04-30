<?php
ini_set("display_errors", "On");
date_default_timezone_set("PRC");


$databaseArr = array(
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_NAME'=>'dingcan',
    'DB_USER'=>'root',
    'DB_PWD'=>'root',
    'DB_PORT'=>'3306',
    'DB_PREFIX'=>'dc_'
);



return $databaseArr;