<?php

    // 使用@滤掉错误提醒,改用die进行友好提示
    
    // 1.连接数据库：
        // 参数：localhost:端口号,用户名,密码
    @$link = mysqli_connect("localhost:3307","root","") or die('数据库连接错误!');  // 后面会大量使用到该连接
    
    // 2.选择数据库：
        // 参数：连接,数据库名称
    @mysqli_select_db($link,'liuyan') or die('选择数据库错误!');

    // 3.设置传输编码：(防止数据库和web服务器编码不一致)
    @mysqli_set_charset($link,"UTF8");  // 注：此处写作UTF8,没有-,数据库只识别utf8
    
?>