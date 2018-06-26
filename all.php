<?php
    include "conn.php";
    // 每次进入页面，先给访问率+1:
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "update blog set hits=hits+1 where id='$id'";
        $query = mysqli_query($link,$sql);
        if($query){
            // 显示当前页：
            $sql = "select * from blog where id='$id'";
            $query = mysqli_query($link,$sql);
            $arr = mysqli_fetch_array($query);        
        }
    }
?>

<meta charset='utf-8'>
<h3>标题：<?php echo  $arr['title']?></h3>
<li>时间：<?php echo  $arr['time']?></li>
<span>访问率：<?php echo  $arr['hits']?></span>
<p>内容：<?php echo  $arr['content']?></p>
<hr>