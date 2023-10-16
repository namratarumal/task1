<?php
session_start();
session_destroy();
echo '<script> alert("logout successefully")
window.location.href="index.php";
</script>';
//header("location:index.php");

?>