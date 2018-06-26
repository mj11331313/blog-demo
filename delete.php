<?php
    include "conn.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from blog where id='$id'";
        $query = mysqli_query($link,$sql);
        if($query){
            echo "<script>location = 'index.php'</script>";
        }else{
            echo "删除失败";
        }
    }
?>



