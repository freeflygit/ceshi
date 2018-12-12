<?php

// logout.php
// 清空登录状态的 判定条件
session_start();

//当初当前用户的session记录
session_unset();
session_destroy();

//session记录失效: 把登录依赖的条件过期即可
setcookie('user', '', 0, '/');

//跳回首页
header('location: home.php');
