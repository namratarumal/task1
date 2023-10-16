<?php
$id=$_GET['id'];
include("../../../config.php");
$sql="delete from batch where id=$id";
$res=mysqli_query($con,$sql);
if($res)
{
    echo '<script> alert("data deleted")
    window.location.href="batch_table.php"
    </script>';
    //header('Location:batch_table.php');
}
else
{
    echo "error";
}
?>