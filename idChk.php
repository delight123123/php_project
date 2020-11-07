<?php
    require('./DBconnect.php');
    $chkid=$_POST['useridChk'];
    $query="select count(*) from reboard.tbl_user t where t.userid='$chkid'";
    $bb=mysqli_query($link,$query);
    $aaa=tblregister($bb);
    
    $result['success']	= true;
    $res=$aaa['count(*)'];

    echo $res;
?>