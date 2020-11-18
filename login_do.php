<?php
    session_start();

    include_once('./DBconnect.php');

    $userid=$_POST['userid'];
    $userpw=$_POST['userpw'];
    $sql1="select count(*) from reboard.tbl_user t where t.userid='$userid'";
    $sql2="select t.userpw from reboard.tbl_user t where t.userid='$userid'";
    $aaa=tblregister($sql1);

    $res1=$aaa['count(*)'];

    if($res1==0){
        echo 1;
    }else{
        $aaa=tblregister($sql2);
        $res2=$aaa['userpw'];
        if(password_verify($userpw,$res2)){
            echo 2;
        }else{
            echo 3;
        }
    }

?>