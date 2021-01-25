<?php require_once('./maintop.php');

require_once('./DBconnect.php');

$no=$_GET['no'];

$sql="select * from reboard.tbl_reboard t where t.reboard_no=$no";

$result=tblregister(mysqli_query($link,$sql));

$delflag=$result['delflag'];
$reboardno=$result['reboard_no'];
if($delflag!='N'){
	echo "<script>alert('잘못된 url입니다.');history.back();</script>";
}

?>
<link rel="stylesheet" type="text/css" 
	href='/resources/css/mainstyle.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/clear.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/formLayout.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/mystyle.css' />


<div class="content-wrapper">
	<div class="card">
		<div class="card-body" style="width: 100%; overflow: auto;">
			<div class="divForm">
				<div class="firstDiv">
					<span class="sp1">제목</span> <span><?php echo $result['reboard_title'];?></span>
				</div>
				<div>
					<span class="sp1">작성자</span> <span><?php echo $result['userid'];?></span>
				</div>
				<div>
					<span class="sp1">등록일</span> <span><?php echo $result['reboard_reg'];?></span>
				</div>
				<div>
					<span class="sp1">조회수</span> <span><?php echo $result['readcount'];?></span>
				</div>
				<div>
					<span class="sp1">첨부파일</span> 
					<span>
					<?php
					if($result['originalfilename']!=''){
						echo "<img src='/resources/images/file.gif'>";
						echo "<a href='/download.php?no=".$result['reboard_no']."&filename=".$result['filename']."'>".$result['originalfilename']."</a>"." | 다운 : ".$result['downcount'];
					}else{
						echo "";
					}

					?>
					</span>
				</div>

				<div class="lastDiv">		
					<p class="content"><?php $result['reboard_content']?></p>
				</div>

				<div class="text-center">
				<?php
				if($_SESSION['userid']==$result['userid']){
					echo "<a href='./edit.php/no=".$result['reboard_no']."'>수정</a> |<a id='delA' href='#'>삭제</a> |";
				}
				?>
					<a href='./main.php'>
						목록</a> 
								
				</div>
			</div>
			<div class="divForm2">
			<div class="replydiv">
			
			</div>
			<div class="divForm">
            <form name="replyfrm" method="post" enctype="multipart/form-data" 
                action='#' >
            <fieldset>
                <legend>댓글</legend>
                    <div class="firstDiv">
                       
                    </div>
                    <div>  
                        <label for="content">내용</label>        
                        <textarea id="content" name="content" rows="6" cols="10" value="<?=$content?>"></textarea>
                    </div>
                    <div class="align_right">
                        <input type = "submit" value="등록"/>       
                    </div>
                </fieldset>
            </form>
        </div>  
			</div>
		</div>
	</div>
</div>
<input type="hidden" value="<?php echo $_SESSION['userid']?>" id="loginuserid">
<input type="hidden" value="<?php echo $reboardno?>" id="reboardno">
<?php require_once('./mainbottom.php');?>


<script type="text/javascript">
	$(function() {
		$("#mainBoard").addClass("active");

		$("#delA").click(function() {
			if(alert("삭제 하시겠습니까?")){
				location.href='/delete.php?no=${param.reboardNo }&groupno=${vo.groupno }&step=${vo.step }';
			};

			$(form[name='replyfrm']).submit(function(){
				if($("#content").val()==null || $("#content").val()==""){
					alert("댓글을 입력하세요");
					$("#content").focus();
					event.preventDefault();
				}else{
					//댓글등록 ajax
					replywrite();
				}
			});
		});




	});


	function replywrite(){
		$.ajax({
    				url:"/replyinsert.php",
    				type:"post",
    				data:
    					{
    						userid : $("#loginuserid").val(),
    						content:$("#content").val(),
    						reboardno:$("#reboardno").val()
    					
    					}
    				,
    				success:function(res){
    					 if(res==1){
							 
							alert("댓글 등록 완료");
							location.reload();
    					}else if(res==2){
    						alert("등록 중 오류 발생!!");    						
    					}else{
    						
    					} 
    					
    				},
    				error:function(xhr,status,error){
    					alert("Error : "+status+", "+error);
    				}
    			});
	};

	

</script>
