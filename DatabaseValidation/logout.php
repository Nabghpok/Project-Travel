<?php
session_start();
$_SESSION = array();
session_destroy();
header("refresh:2;url=../HTMLPages/index.php");
// header("location:../HTMLPages/index.php");
exit;
