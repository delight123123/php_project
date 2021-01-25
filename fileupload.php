<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="frmWrite" method="post" enctype="multipart/form-data" 
                action='./fileupload_do.php' >
                <div>
                    <label for="upfile">첨부파일</label>
                    <input type="file" id="upfile" name="upfile" />(최대 2M)
                </div>
                <input type = "submit" value="등록"/>

                </form>
</body>
</html>