<?php
    require('DBconnect.php');
    
    $userid=$_POST['userid'];
    $userpw=$_POST['userpw'];
    $email1=$_POST['email1'];
    $email2;
    if($_POST['email3']!=''){
        $eamil2=$_POST['email3'];
    }else{
        $eamil2=$_POST['email2'];
    }

    $sql= "insert into tbl_user(userid,userpw,email1,email2) values('$userid', '$userpw', '$eamil1', '$email2')";
        $res=mysqli_query($link,$sql);
        if($res){
            echo "<script>alert('회원가입 되었습니다.');location.href='./login.php';</script>";
        }else{
            echo "<script>alert('회원가입에 실패하였습니다.');location.href='./register.php';</script>";
        }

    
?>