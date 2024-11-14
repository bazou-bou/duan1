<?php

session_start();


session_unset(); 
session_destroy(); 


echo "<script>window.location.href = '?act=client-login';</script>";
exit();

?>
