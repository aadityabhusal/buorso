<?php
session_start();
session_destroy();
setcookie('id','',time()-86400,'/');
header('Location:login/');
?>