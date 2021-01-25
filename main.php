<?php require_once('./maintop.php');
require_once('./pagingInfo.php');
?>
<link rel="stylesheet" type="text/css" 
	href='/resources/css/mainstyle.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/clear.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/formLayout.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/mystyle.css' />
<form action="./main.php" 
	name="frmPage" method="post">
	<input type="text" name="searchCondition" 
		value="<?=$searchCondition ?>" id="aa1">
	<input type="text" name="searchKeyword" 
		value="<?=$searchKeyword ?>" id="aa2">
	<input type="text" name="currentPage" value="<?=$currentPage ?>"  id="aa3">

</form>

<div class="content-wrapper">
	<div class="card">
		<div class="card-body" style="width: 100%; overflow: auto;">
			<table class="table text-center" style="width: 100%;">
				<colgroup>
					<col style="width:10%;" />
					<col style="width:50%;" />
					<col style="width:15%;" />
					<col style="width:15%;" />
					<col style="width:10%;" />		
				</colgroup>
				<thead style="width: 100%;">
				  <tr class="">
				    <th scope="col">번호</th>
				    <th scope="col">제목</th>
				    <th scope="col">작성자</th>
				    <th scope="col">작성일</th>
				    <th scope="col">조회수</th>
				  </tr>
				</thead>
				<tbody style="width: 100%;">
				<?php
				if(empty($list)){?>
					<tr>
						<td colspan="5">해당 글이 존재하지 않습니다.</td>
					</tr>
				<?php }else{
					$result=mysqli_query($link,$listsql);
					while($row=mysqli_fetch_array($result)){
						 ?>
					<tr>
						<td><?=$row['reboard_no'] ?></td>
						<td><a href="./detail.php?no=<?=$row['reboard_no']?>"><?=$row['reboard_title'] ?></a></td>
						<td><?=$row['userid'] ?></td>
						<td><?=$row['reboard_reg'] ?></td>
						<td><?=$row['readcount'] ?></td>
					</tr>
				<?php	
					} 
						} ?>
				</tbody>
			</table>
			
			<div class="divPage text-center">
	 <!-- 이전블럭으로 이동 -->
	<?php
		if($firstPage>1){
			echo "<button type='button' class='btn btn-social-icon btn-outline-youtube btn-sm' onclick='pageFunc($firstPage-1)'> &lt;&lt;</button>";
		}
	?>
	<!-- 페이지 번호 추가 -->						
	<?php
	for($i=$firstPage;$i<=$lastPage;$i++){
		if($i==$currentPage){
			echo "<span class='btn btn-success btn-sm'>$i</span>";
		}else{
			echo "<input type='button' value='$i' class='btn btn-danger btn-sm' onclick='pageFunc($i)>";
		}

	}
	?>
	
	<!--  페이지 번호 끝 -->
	
	<!-- 다음블럭으로 이동 -->
	<?php
	if($lastPage<$totalPage){
		echo "<button type='button' class='btn btn-social-icon btn-outline-youtube btn-sm' onclick='pageFunc($lastPage+1)'> &gt;&gt;</button>";
	}
	?>
	</div>
			<div class="divSearch">
			   	<form name="frmSearch" method="post" action='./main.php'>
			   	<div class="row" style="margin: 0 0 0 0;">
			   		<div class="col-sm-2"></div>
			        <select name="searchCondition" class="form-control form-control-sm col-sm-2" style="display: inline;">
			            <option value="reboard_title" 
			            	<?php if($searchCondition=='reboard_title'){ ?>
								selected="selected"
							<?php } ?>
			            >제목</option>
			            <option value="reboard_content" 
						<?php if($searchCondition=='reboard_content'){ ?>
								selected="selected"
							<?php } ?>
			            	>내용</option>
			            <option value="userid" 
						<?php if($searchCondition=='userid'){ ?>
								selected="selected"
							<?php } ?>
			            	>작성자</option>
			        </select>   
			        <input type="text" name="searchKeyword" title="검색어 입력" class="form-control form-control-sm col-sm-5" style="display: inline;"
			        value="<?=$searchKeyword ?>">   
					<input type="submit" class="form-control form-control-sm col-sm-1" style="display: inline;" value="검색">
					<div class="col-sm-2"></div>
					</div>
			    </form>
			</div>
			
			<div class="divBtn text-right">
			    <a href='./write.php' class="btn btn-light btn-sm">쓰기</a>
			</div>
			
		</div>
	</div>
</div>

<?php require_once('./mainbottom.php');?>

<script type="text/javascript">
	$(function() {
		$("#mainBoard").addClass("active");

	});

	function pageFunc(curPage){
		document.frmPage.currentPage.value=curPage;
		
		document.frmPage.submit();
	}
	

</script>
