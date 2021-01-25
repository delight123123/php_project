<?php
$file=$_FILES['upfile'];

if($file['size']>2097152){
    echo "<script>alert('로그인 후 이용 가능합니다.');location.href='./login.php';</script>";
}else{
    if(is_uploaded_file($file['tmp_name'])){
        $path=getcwd()."/uploadfile/";
        $fileoriginalname=$path.$file['name'];
        $now_uploadfile=substr($fileoriginalname,0,strrpos($fileoriginalname,".")).date("YmdHis",time()).substr($fileoriginalname,strrpos($fileoriginalname,"."));
        echo "뒤에꺼 substr($fileoriginalname,strrpos($fileoriginalname,'.')<br>";
        echo "$now_uploadfile<br>";
        if(!is_dir($path)){
            mkdir($path);
        }
        echo "파일있음<br>";
        if(move_uploaded_file($file['tmp_name'],$now_uploadfile)){
            echo "파일이름 : ".$file['name']."<br>";
            echo "파일크기 : ".$file['size']."<br>";
            echo "파일타입 : ".$file['type']."<br>";
            echo "파일에러 : ".$file['eroor']."<br>";
            echo getcwd()."경로에 파일을 업로드 하였습니다.<br>\n";
        }else{
            echo getcwd()."경로에 파일을 업로드 실패.<br>\n";
        }
    }else{
        echo "파일없음<br>";
    }
}



?>