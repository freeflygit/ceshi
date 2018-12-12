<?php

// captcha.php
// 张三给李四借钱, 李四从王五手里借到了钱
// 即 王五钱给了 李四, 李四的钱给了 张三..
//
// show() 显示验证码,  show()中调用了 showCode()函数
//
// showCode()把验证码返回给了 show(), show()再返回给调用方

function show($width = 350, $height = 100, $len = 5)
{
    $image = imagecreatetruecolor($width, $height);

    $gray = rgb($image, 222, 222, 222);
    imagefill($image, 0, 0, $gray);

    //字
    $code = drawCode($image, $len, $width, $height);
    //线
    drawLine($image, $width, $height);
    //点
    drawPixel($image, $width, $height);

    // header('content-type:image/png');

    imagepng($image);
    imagedestroy($image);

    return $code;
}

//1.字
function drawCode($image, $len, $width, $height)
{
    $string = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

    //为拼接验证码做准备
    $code = '';

    for ($i = 0; $i < $len; $i++) {
        $size  = $height / 2;
        $angle = mt_rand(-20, 20);
        $x     = $width / $len * $i;
        $y     = $height * 3 / 4;

        $color = randColor($image);

        $fontfile = __DIR__ . '/SFMono-Regular.otf';

        $text = $string[mt_rand(0, strlen($string) - 1)];

        //每次循环都把生成的1个验证码累加拼接到$code中
        $code .= $text;

        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }

    //把生成的验证码返回给调用方
    return $code;
}

//线干扰
function drawLine($image, $width, $height)
{
    for ($i = 0; $i < 30; $i++) {
        $x1 = mt_rand(0, $width);
        $y1 = mt_rand(0, $height);
        // 乱七八糟的其他代码....
        $x2 = mt_rand(0, $width);
        $y2 = mt_rand(0, $height);

        $color = randColor($image);

        imageline($image, $x1, $y1, $x2, $y2, $color);
    }
}

//点干扰: 函数的参数和返回值 需要大量的经验才能预测到, 是难点
function drawPixel($image, $width, $height)
{
    for ($i = 0; $i < 200; $i++) {
        $x = mt_rand(0, $width);
        $y = mt_rand(0, $height);

        $color = randColor($image);

        imagesetpixel($image, $x, $y, $color);
    }
}

//复用: 某段代码比较复杂 还经常使用, 那么可以提取出来
//作用: 生成一个随机颜色给调用者, 所以一定有返回值
function randColor($image)
{
    $color = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    return $color;
}

//函数还能给其他函数起别名
// rgb($image, 0,0,0);
function rgb($image, $red, $green, $blue)
{
    return imagecolorallocate($image, $red, $green, $blue);
}
