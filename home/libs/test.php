<?php

// test.php
include 'captcha.php';

// 询问浏览器是否有唯一标识, 没有就创建一个.
session_start();

$code = show();

//$_SESSION就是当前唯一标识对应的服务器上的存储空间名
//绑定数据code 到 唯一标识上
//留存信息, 绑定到当前唯一标识对应的空间中
$_SESSION['code'] = $code;
