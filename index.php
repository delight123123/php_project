<!DOCTYPE HTML>
<html lang="ko">
<head>
<title>자유게시판 글 목록 - 허브몰</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" 
	href="/resources/css/mainstyle.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/clear.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/formLayout.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/mystyle.css' />
<script type="text/javascript" 
	src='/resources/js/jquery-3.4.1.min.js'></script>

<script type="text/javascript">	
	$(function(){
		$(".box2 tbody tr").hover(function(){
			$(this).css("background","lightblue");
		}, function(){
			$(this).css("background","");
		});	
	});
	
	function pageFunc(curPage){
		document.frmPage.currentPage.value=curPage;
		
		document.frmPage.submit();
	}
	
</script>
<style type="text/css">
	body{
		padding:5px;
		margin:5px;
	 }	
</style>	
</head>	
<body>
<h2>자유게시판</h2>
<c:if test="">
	<p>검색어 : , 
			건 검색되었습니다.</p>	
</c:if>

<!-- 페이징 처리 관련 form -->
<form action='/board/list.do'
	name="frmPage" method="post">
	<input type="text" name="searchCondition" 
		value="">
	<input type="text" name="searchKeyword" 
		value="">
	<input type="text" name="currentPage" >
</form>

<div class="divList">
<table class="box2">
	<caption>기본 게시판</caption>
	<colgroup>
		<col style="width:10%;" />
		<col style="width:75%;" />
		<col style="width:15%;" />		
	</colgroup>
	<thead>
	  <tr>
	    <th scope="col">번호</th>
	    <th scope="col">제목</th>
	    <th scope="col">작성일</th>
	  </tr>
	</thead> 
	<tbody>
		
	  </tbody>
</table>	   
</div>

<div class="divPage">
	
</div>

<div class="divSearch">
   	<form name="frmSearch" method="post" 
   		action=''>
        <select name="searchCondition">
            <option value="title" 

            		selected="selected"

            >제목</option>
            <option value="content" 

            		selected="selected"

            >내용</option>
            <option value="name" 

            		selected="selected"
            
            >작성자</option>
        </select>   
        <input type="text" name="searchKeyword" title="검색어 입력"
        	value="">   
		<input type="submit" value="검색">
    </form>
</div>

<div class="divBtn">
    <a href='/write.php' >글쓰기</a>
</div>

</body>
</html>