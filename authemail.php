<?php
require('./authvalue.php');
$userauthNum=$_POST['cer'];
$useremail;

if($_POST['email3']!=''){
    $useremail=$_POST['email1'].'@'.$_POST['email3'];
}else{
    $useremail=$_POST['email1'].'@'.$_POST['email2'];
}
print_r($auth[$useremail]);
$saveauthNum=$auth[$useremail];

if($userauthNum==$saveauthNum){
    echo 1;
}else{
    echo 2;
}

?>