<?php

// home.php
// 利用session来判定登录状态
session_start();

//认为 session中存了user 就是登录态
//isset()检查数组中的某个键是否存在
//isLogin  是登录态, 值是 true 或 false
$isLogin = isset($_SESSION['user']);

//利用cookie来判定登录态
echo '<p>利用cookie进行登录判断!</p>';
if (isset($_COOKIE['user'])) {
    echo "<a href=''>{$_COOKIE['user']}</a>";
    echo '<br>';
    echo '<a href="logout.php">退出</a>';
} else {
    echo '<a href="login.html">亲,请登录</a>';
    echo '<br>';
    echo '<a href="">免费注册</a>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>利用session进行登录态判定</p>
	<?php if ($isLogin) {?>

	<a href=""><?php echo $_SESSION['user']; ?></a>
	<br>
	<a href="logout.php">退出</a>

	<?php } else {?>

	<a href="login.html">亲,请登录</a>
	<br>
	<a href="">免费注册</a>

	<?php }?>

	<h1>首页内容</h1>
</body>
</html>
