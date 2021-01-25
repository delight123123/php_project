<?php require_once('./maintop.php');?>

<link rel="stylesheet" type="text/css" href='/resources/css/mainstyle.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/clear.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/formLayout.css' />
<link rel="stylesheet" type="text/css" href='/resources/css/mystyle.css' />


<div class="content-wrapper">
	<div class="card">
		<div class="card-body">
        <div class="divForm">
            <form name="frmWrite" method="post" enctype="multipart/form-data" 
                action='./write_do.php' >
            <fieldset>
                <legend>글쓰기</legend>
                    <div class="firstDiv">
                        <label for="title">제목</label>
                        <input type="text" id="title" name="title" value="<?=$title?>" />
                    </div>
                    <div>  
                        <label for="content">내용</label>        
                        <textarea id="content" name="content" rows="12" cols="40" value="<?=$content?>"></textarea>
                    </div>
                    <div>
                        <label for="upfile">첨부파일</label>
                        <input type="file" id="upfile" name="upfile" />(최대 2M)
                    </div>
                    <div class="center">
                        <input type = "submit" value="등록"/>
                        <input type = "Button" value="글목록" 
                        onclick
                        ="location.href	='./main.php'" />         
                    </div>
                </fieldset>
            </form>
        </div>  

           
		
		</div>
	</div>
</div>



<?php require_once('./mainbottom.php');?>


<script type="text/javascript">
	$(document).ready(function() {
        $("#mainBoard").addClass("active");

		$("form[name=frmWrite]").submit(function() {
			if($("#title").val()==null || $("#title").val()==""){
				alert("제목을 입력하세요");
				$("#title").focus();
				event.preventDefault();
			}
		});
	});
	
</script>