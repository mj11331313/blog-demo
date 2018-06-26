<?php
    include "conn.php";
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $cont = $_POST['content'];
        $wid = $_COOKIE["id"];
        $fid = $_POST['fenlei'];

        // 1.拼接sql语句：
            // 插入变量必须要加引号，否则报错; now()是mysql下的函数,不是php的
        $sql = "insert into blog(id,title,content,time,writer,fid) values(null,'$title','$cont',now(),'$wid','$fid')";

        // 2.发送sql语句到数据库：
        $query = mysqli_query($link,$sql);  // $query值为1或空
        if($query){
            echo "<script>location = 'index.php'</script>";
        }else{
            echo "<script>alert('插入失败')</script>";
            echo "<script>location = 'add.php'</script>";
        }
    }
?>

<meta charset='utf-8'>
<form action="add.php" method='post'>
    标题：<input type="text" name='title'>
    <select name="fenlei">
        <?php
            if(isset($_COOKIE['id'])){
                $wid = $_COOKIE['id'];
                $sql = "select * from catalog where writer='$wid'";
                $query = mysqli_query($link,$sql);
                while($arr = mysqli_fetch_array($query)){
        ?>
        <option value="<?php echo $arr['catalog_id'] ?>" name='fenlei'><?php echo $arr['catalog_name'] ?></option>
            <?php
            }
        }
            ?>
    </select><br>
    内容：<br><textarea name="content" cols="20" rows="10"></textarea><br>
    <input type="submit" name='submit' value='添加'>
</form>