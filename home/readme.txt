目录结构
home
--home.php   首页
--login.html 登录页面
--login.php  登录的后端
--logout.php 退出操作的后端
--libs
----captcha.php  验证码封装
----test.php   调用验证码函数, 显示图片
----****.ttf   字体文件


任务1:
1. 先完成 home.php 首页的UI创建
2. 完成 login.html 页面的UI创建
3. 完成login.php 的逻辑操作
   判断验证码是否一致: 不一致就 提示验证码错误
   一致: 判断 用户名和密码是否是 zhangsan  123456
   是: 打印 登录成功,   错误: 登录失败