<?php
    include "conn.php";

    if(isset($_POST['sub'])){
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $sql = "select * from user where uname='$uname'"; 
        $query = mysqli_query($link,$sql); 
        $res = mysqli_fetch_array($query);
        if($res){
            echo "<script>alert('用户名重复，请重新输入!')</script>"; 
        }else{
            $arr = array('%','#','=');
            $flag = true;
            for($i = 0 ; $i < strlen($uname) ; $i ++ ){
                for($j = 0 ; $j < count($arr) ; $j ++ ){
                    if($uname[$i] == $arr[$j]){
                        $flag = false;
                    }
                }
            }
            if($flag){
                $sql = "insert into user(uid,uname,pass) values(null,'$uname','$pass')";
                $query = mysqli_query($link,$sql); 
                if($query){
                    header("location:index.php"); 
                }else{
                    header("location:reg.php");
                }
            }else{
                echo "<script>alert('输入用户名非法')</script>";
                echo "<script>location = 'reg.php'</script>";
            }
            echo "<script>location='index.php'</script>"; 
        }
        // 禁止输入部分特殊符号：
        /* $arr = array('%','#','=');
        $flag = true;
        for($i = 0 ; $i < strlen($uname) ; $i ++ ){
            for($j = 0 ; $j < count($arr) ; $j ++ ){
                if($uname[$i] == $arr[$j]){
                    $flag = false;
                }
            }
        } */
        
        /* if($flag){
            $sql = "insert into user(uid,uname,pass) values(null,'$uname','$pass')";
            $query = mysqli_query($link,$sql); 
            if($query){
                header("location:index.php"); 
            }else{
                header("location:reg.php");
            }
        }else{
            echo "<script>alert('输入用户名非法')</script>";
            echo "<script>location = 'reg.php'</script>";
        } */
    }
?>

<meta charset='utf-8'>
<form action="reg.php" method='post'>
    用户名：<input type="text" name='uname'><br>
    密码：<input type="password" name='pass'><br>
    <input type="submit" name='sub' value='注册'>
</form>