<?php

$link=mysqli_connect("192.168.219.41","test2","1234");
if($link){
    echo '성공';
}else{
    echo '실패';
}


?>