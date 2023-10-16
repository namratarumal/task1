<?php
$id=$_GET['id'];
include("../../../config.php");
$sql="delete from team where id=$id";
if(mysqli_query($con,$sql))
{
    echo '<script> alert("data delete")
    window.location.href="teachres_table.php"
    </script>';
}
else
{
    echo "error".$con->error;
}
?>