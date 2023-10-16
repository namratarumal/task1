<?php
session_start();
//session_destroy();
// unset($_SESSION['admin']);
session_destroy();
header("location:index.php");
?>