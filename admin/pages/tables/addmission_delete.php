<?php
$id=$_GET['id'];
include("../../../config.php");
$sql="delete from addmission where id=$id";
if(mysqli_query($con,$sql))
{
    echo '<script> alert("data deleted")
    window.location.href="addmission_table.php"
    </script>';
}
else
{
    echo "error".$con->error;
}
?>