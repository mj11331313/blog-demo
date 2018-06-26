<?php
    include "conn.php";
    if(isset($_POST['sub'])){
        $cname = $_POST['cname'];
        $wid = $_COOKIE["id"];
        $sql = "select * from catalog where catalog_name='$cname' and writer='$wid'";
        $query = mysqli_query($link,$sql); 
        $res = mysqli_fetch_array($query);
        if($res){
            echo "<script>alert('分类名重复，请重新输入!')</script>";
            echo "<script>location = 'add_catalog.php'</script>"; 
        }else{
            $sql = "insert into catalog(catalog_id,catalog_name,writer) values(null,'$cname','$wid')";
            $query = mysqli_query($link,$sql);
            if(!$query){
                echo "<script>alert('插入失败')</script>";
                echo "<script>location = 'add_catalog.php'</script>";
            }
            echo "<script>location = 'add.php'</script>";
        }
    }
?>

<meta charset='utf-8'>
<form action="add_catalog.php" method='post'>
    <input type="hidden" name='fenlei' value="<?php echo $cname ?>">
    <input type="text" name='cname'>
    <input type="submit" name='sub' value='添加分类'>
</form>