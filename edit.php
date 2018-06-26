<?php
    include "conn.php";
    // 进入页面后默认显示修改前的内容：
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from blog where id='$id'";
        $query = mysqli_query($link,$sql);
        $arr = mysqli_fetch_array($query);
    }
    // 点击修改时更新数据：
    if(isset($_POST['submit'])){  
        $title = $_POST['title'];
        $cont = $_POST['content'];
        $sid = $_POST['sid'];
        $sql = "update blog set title='$title',content='$cont' where id='$sid'";
        $query = mysqli_query($link,$sql);
        if($query){
            header("location:index.php");  // header方式跳转页面
        }        
    }
?>
<meta charset='utf-8'>
<form action="edit.php" method='post'>
    <input type="hidden" name='sid' value="<?php echo  $id ?>">  <!--保存id值-->
    标题：<input type="text" name='title' value="<?php echo  $arr['title']?>"><br>
    内容：<textarea name="content" cols="20" rows="10"><?php echo  $arr['content']?></textarea><br>
    <input type="submit" name='submit' value='修改'>
</form>