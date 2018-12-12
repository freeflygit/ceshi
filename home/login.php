<?php
//login.php
//接收参数
$user    = $_POST['user'];
$pwd     = $_POST['pwd'];
$captcha = $_POST['captcha'];

echo '用户录入的验证码是: ', $captcha, '<br>';

//1. 先对比用户录入的验证码 和 服务器生成的验证码是否一致!
//用户再次回归, 我们需要查看此用户之前在服务器上留存的正确验证码
session_start();

//session_start() 读取此用户的唯一标识, 并找到此标识在服务器上对应的存储空间
//获取此用户之前留存的正确验证码
$code = $_SESSION['code'];

echo '留存在服务器上的正确验证码:', $code, '<hr>';

// 不区分大小写比较: 都变小以后 再比较
// strtolower() 把字符串英文都变小写
if (strtolower($code) != strtolower($captcha)) {
    die('验证码错误!');
}

//对比账号密码
if ($user == 'zhangsan' && $pwd == '123456') {

    //登录成功时, 保存用户名到 session中
    //即: session中存放了user 就一定是登录后的状态
    $_SESSION['user'] = $user;

    //向cookie中写入user, 有效期30天
    setcookie('user', $user, strtotime('+30day'), '/');

    // echo '登录成功!';
    // location: 定位
    // 下方代码是php的后端页面跳转代码, 可以把页面跳转到对应位置
    header('location: home.php');
} else {
    echo '登录失败!';
}
