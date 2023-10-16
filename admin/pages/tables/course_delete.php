<?php
$id=$_GET['id'];
include("../../../config.php");
$sql="delete from basic_course where id=$id";
if(mysqli_query($con,$sql))
{
    echo '<script> alert("data deleted")
    window.location.href="course_detail.php"
    </script>';
}
else
{
    echo "error".$con->error;
}
?>