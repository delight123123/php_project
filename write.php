<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href='/resources/css/mainstyle.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/clear.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/formLayout.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/mystyle.css' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 작성</title>
    <script type="text/javascript" src='/resources/js/jquery-3.4.1.min.js'></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("form[name=frmWrite]").submit(function() {
			if($("#title").val()==null || $("#title").val()==""){
				alert("제목을 입력하세요");
				$("#title").focus();
				event.preventDefault();
			}
		});
	});
	
</script>
</head>
<body>
<div class="divForm">
<form name="frmWrite" method="post" action="/write_ok.php" >
 <fieldset>
	<legend>글쓰기</legend>
        <div class="firstDiv">
            <label for="title">제목</label>
            <input type="text" id="title" name="title"  />
        </div>
        <div>  
        	<label for="description">내용</label>        
 			<textarea id="description" name="description" rows="12" cols="40"></textarea>
        </div>
        <div class="center">
            <input type = "submit" value="등록"/>
            <input type = "Button" value="글목록" onclick="location.href	='/index.php'" />         
        </div>
    </fieldset>
</form>
</div>   
</body>
</html>