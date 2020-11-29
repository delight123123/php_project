<?php
    session_start();

    include('./DBconnect.php');

    $userid=$_POST['userid'];
    $userpw=$_POST['userpw'];

    //$userpw=mysqli_real_escape_string($link,$_POST['userpw']);
    $sql1="select count(*) from reboard.tbl_user t where t.userid='$userid'";
    $sql2="select * from reboard.tbl_user t where userid='$userid'";
    $aaa=tblregister(mysqli_query($link,$sql1));
    
    $res1=$aaa['count(*)'];

    if($res1=='0'){
        echo 1;
    }else{
        $bbb=tblregister(mysqli_query($link,$sql2));
        $res2=$bbb['userpw'];

        //$aaa['userpw'];
        if(password_verify($userpw,$res2)){
            echo 2;
            $_SESSION['userid']=$userid;
        }else{
            echo 3;
        }
        
    }




?>