<meta charset='utf-8'>
<a href="add.php">添加文章</a

<?php
    include "conn.php";
    if(isset($_GET["flag"])){
        setcookie("id","",time()-3600);
    }
    if($_COOKIE["id"]){
        $id = $_COOKIE["id"];
        $sql = "select * from user where uid='$id'"; 
        $query = mysqli_query($link,$sql); 
        $res = mysqli_fetch_array($query);
        if($res) $uname = $res['uname'];
        echo "<span>$uname</span>";
        echo "&nbsp;";
        echo "<a href='unlogin.php'>退出登录</a>";
        echo "&nbsp;";
        echo "<a href='add_catalog.php'>添加分类</a>";
    }else{
        echo "<a href='login.php'>未登录</a>";
        echo "&nbsp;";
        echo "<a href='reg.php'>注册</a>";
    }

?>

<form action="index.php" method='get'>
    <input type="text" name='search'>&nbsp;&nbsp;
    <input type="submit" name='sub' value='搜索'>
</form>

<?php
    if(isset($_GET['search'])){
        $sea = $_GET['search'];
        $w = "title like '%$sea%'";
    }else{
        $w = 1;
    }

    $sql = "select * from blog where $w order by id desc";  // 根据id倒序排序,限定只显示2条数据(limit只能写在最后)
    $query = mysqli_query($link,$sql);  // $query是数据库查询后返回的resource类型的结果集
    // mysqli_fetch_array: 从结果集中读取一行,将其转化为关联数组,每次执行完会自动读取下一行数据
    while($arr = mysqli_fetch_array($query)){
        $aid = $arr['writer'];
        $newsql = "select * from user where user.uid='$aid'";
        $newquery = mysqli_query($link,$newsql);
        $newarr = mysqli_fetch_array($newquery);
?>
<!--可以使用$_SERVER[PHP_SELF]来动态获取当前php文件的url-->


<!--依次从转化后的关联数组中获取数据：-->
<div style="width:750">
    <h3><a href="all.php?id=<?php echo $arr['id'] ?>"><?php echo  $arr['title']?></a> | <a href="delete.php?id=<?php echo $arr['id'] ?>">删除</a> | <a href="edit.php?id=<?php echo $arr['id'] ?>">修改</a></h3>  <!--中括号内的名称必须和数据库表的列名保持一致!-->
    <li><?php echo $arr['time'] ?></li>
    <li>作者：<?php echo $newarr['uname'] ?></li>
    <p><?php echo iconv_substr($arr['content'],0,4); ?>...</p>
    <hr>
<?php
    }
?>
</div>
