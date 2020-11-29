<?php
session_start();
$userauthNum=$_POST['cer'];
$useremail;

if($_POST['email3']!=''){
    $useremail=$_POST['email1'].'@'.$_POST['email3'];
}else{
    $useremail=$_POST['email1'].'@'.$_POST['email2'];
}

$saveauthNum=$_SESSION[$useremail];

if($userauthNum==$saveauthNum){
    session_unset($useremail);
    echo 1;
}else{
    echo 2;
}

?>