<?php

session_start();


session_unset(); 
session_destroy(); 

// $_SESSION["username"] == "khách";
// $_SESSION["id"] == 0;

echo "<script>window.location.href = '?act=client-login';</script>";
exit();

?>
