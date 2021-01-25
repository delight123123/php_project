<?php
require('./DBconnect.php');
session_start();
if(!$_SESSION['userid']){
  echo "<script>alert('로그인 후 이용 가능합니다.');location.href='./login.php';</script>";
}
$title=$_POST['title'];
$file=$_FILES['upfile'];
$content=$_POST['content'];
$fileoriginalname="";
$filename="";
$filesize=0;
$userid=$_SESSION['userid'];


if($file['size']>2097152){
    echo "<script>alert('파일 크기가 큽니다');history.back();</script>";
}else{
    if(is_uploaded_file($file['tmp_name'])){
        $fileoriginalname=$file['name'];
        session_start();
        
        $path=getcwd()."/uploadfile/".$_SESSION['userid']."/";
        
        $filename=substr($fileoriginalname,0,strrpos($fileoriginalname,".")).date("YmdHis",time()).substr($fileoriginalname,strrpos($fileoriginalname,"."));
        $now_uploadfile=$path.$filename;
        if(!is_dir($path)){
            mkdir($path);
        }
    
        if(move_uploaded_file($file['tmp_name'],$now_uploadfile)){
            $filesize=$file['size'];
        }
    }
}

$writesql="insert INTO reboard.tbl_reboard(reboard_title, reboard_content,  filename, filesize, originalfilename, userid)
VALUES('$title', '$content', '$filename', $filesize, '$fileoriginalname', '$userid')";
    $res=mysqli_query($link,$writesql);
    if($res){
        echo "<script>alert('게시글이 등록되었습니다.');location.href='./main.php';</script>";
    }else{
        echo "<script>alert('게시글 등록에 실패하였습니다.');history.back();</script>";
    }


?>