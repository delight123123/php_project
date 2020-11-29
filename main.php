<?php require_once('./maintop.php');?>
<link rel="stylesheet" type="text/css" 
	href='/resources/css/mainstyle.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/clear.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/formLayout.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/mystyle.css' />
<form action="<c:url value=''/>" 
	name="frmPage" method="post">
	<input type="hidden" name="searchCondition" 
		value="${param.searchCondition}" id="aa1">
	<input type="hidden" name="searchKeyword" 
		value="${param.searchKeyword}" id="aa2">
	<input type="hidden" name="currentPage" value="${pagingInfo.currentPage }"  id="aa3">

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
				
					
				</tbody>
			</table>
			
			<div class="divPage text-center">
	 <!-- 이전블럭으로 이동 -->
	
	<!-- 페이지 번호 추가 -->						
	
	
	<!--  페이지 번호 끝 -->
	
	<!-- 다음블럭으로 이동 -->
	
	</div>
			<div class="divSearch">
			   	<form name="frmSearch" method="post" action='<c:url value='/main'/>'>
			   	<div class="row" style="margin: 0 0 0 0;">
			   		<div class="col-sm-2"></div>
			        <select name="searchCondition" class="form-control form-control-sm col-sm-2" style="display: inline;">
			            <option value="reboard_title" 
			            	
			            >제목</option>
			            <option value="reboard_content" 
			            
			            	>내용</option>
			            <option value="userid" 
			            
			            	>작성자</option>
			        </select>   
			        <input type="text" name="searchKeyword" title="검색어 입력" class="form-control form-control-sm col-sm-5" style="display: inline;"
			        value="">   
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
