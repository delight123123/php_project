<?php
require_once('./DBconnect.php');

$recodeCount=10;
$blockSize=10;
$searchCondition=$_POST['searchCondition'];
$searchKeyword=$_POST['searchKeyword'];

//pageing
$currentPage=1;
if($_POST['currentPage']!=1){
    $currentPage=$_POST['currentPage'];
}

$recodeCountPerPage=$recodeCount;

$firstPage=$currentPage-(($currentPage-1)%$blockSize);
$lastPage=$firstPage+($blockSize-1);

$PagingFirstRecodeIndex=($currentPage-1) * $recodeCountPerPage;
$PagingLastRecordIndex=$currentPage * $recodeCountPerPage;

$PagingTotalPage;  //페이지수 계산해서 넣어줘야함

$FirstRecodeIndex;
if($firstPage==1){
    $FirstRecodeIndex=0;
}else{
    $FirstRecodeIndex=$firstPage-1;
}

$plussql;

if($searchKeyword!=''){
    $plussql=" $searchCondition like concat('%',$searchCondition,'%')";
}else{
    $plussql="";
}

$listsql="select t.reboard_no,t.reboard_title,t.originalfilename,t.readcount,t.reboard_reg,t.userid,t.delflag,
DATEDIFF(NOW(), t.reboard_reg)*24 as newImgTerm
from reboard.tbl_reboard t where t.delflag='N' $plussql order by t.reboard_no desc limit $recodeCountPerPage offset $FirstRecodeIndex";

$pageCountsql="select count(*) from board $plussql";

$queryres=tblregister(mysqli_query($link,$pageCountsql));

$list=tblregister(mysqli_query($link,$listsql));

$PagingTotalPage=$queryres['count(*)'];

//PagingTotalPage자리

if($lastPage>$PagingTotalPage){//이게 거의 마지막
    $lastPage=$PagingTotalPage;
}

?>