<?php
    include "conn.php";
    if(isset($_POST['sub'])){
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $sql = "select * from user where uname='$uname' and pass='$pass'"; 
        $query = mysqli_query($link,$sql);
        $arr = mysqli_fetch_array($query);
        if($arr){
            setcookie("id",$arr['uid']);
            echo "<script>location = 'index.php';</script>"; 
        }
    }
?>

<meta charset='utf-8'>
<form action="login.php" method='post'>
    用户名：<input type="text" name='uname'><br>
    密码：<input type="password" name='pass'><br>
    <input type="submit" name='sub' value='登录'>
</form>