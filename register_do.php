<?php
    require('DBconnect.php');
    
    $userid=$_POST['userid'];
    $userpw=$_POST['userpw'];
    //$userpw=mysqli_real_escape_string($link,$_POST['userpw']);
    $email1=$_POST['email1'];
    $email2;
    $email3=$_POST['email3'];
    
    if($_POST['email3']!=''){
        $email2=$_POST['email3'];
    }else{
        $email2=$_POST['email2'];
    }
    $userpw=password_hash($userpw, PASSWORD_BCRYPT, ['cost'=>12]);
   
    $sql= "insert into tbl_user(userid,userpw,email1,email2) values('$userid', '$userpw', '$email1', '$email2')";
        $res=mysqli_query($link,$sql);
        if($res){
            echo "<script>alert('회원가입 되었습니다.');location.href='./login.php';</script>";
        }else{
            echo "<script>alert('회원가입에 실패하였습니다.');location.href='./register.php';</script>";
        }
        

    
?>