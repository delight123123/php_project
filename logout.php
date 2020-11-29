<?php
session_start();
if(!$_SESSION['userid']){
    echo "<script>alert('잘못된 url 입니다.');location.href='./login.php';</script>";
  }else{
    session_unset('userid');
    header('Location: login.php');
  }

?>