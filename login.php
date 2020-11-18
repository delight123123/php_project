<!DOCTYPE html>
<html lang="ko">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP - 로그인</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href='/resources/assets/vendors/mdi/css/materialdesignicons.min.css'>
    <link rel="stylesheet" href='/resources/assets/vendors/css/vendor.bundle.base.css'>
    <script type="text/javascript" src ='/resources/js/jquery-3.4.1.min.js'></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href='/resources/assets/css/style.css'>
    <!-- End layout styles -->
    <link rel="shortcut icon" href='/resources/assets/images/favicon.png'>
    <script type="text/javascript">
      $(function(){
        $("#btn").click(function(){
          $.ajax({
    				url:"/login_do.php",
    				type:"post",
    				data:
    					{
    						userid : $("#userid").val(),
    						userpw: $("#userpw").val()
    					}
    				,
    				success:function(res){
    					 if(res==1){
    						alert('입력하신 아이디가 존재하지 않습니다.');
    					}else if(res==2){
                var userid1=$('#userid').val();
    						<?php
                session_start();
                $_SESSION['userid']="<script>document.write (userid1);</script>";
                ?>
                if($("input[type=checkbox]").is(":checked")){
                  <?php
                  setcookie("chk_userid","<script>document.write (userid1);</script>",time()+3600,"/");
                  echo "alert('로그인되었습니다.1');location.href='./main.php';";
                  ?>
                }else{
                  <?php
                    setcookie("chk_userid","<script>document.write (userid1);</script>",0,"/");
                   echo "alert('로그인되었습니다.2');location.href='./main.php';";
                  ?>
                  }
                  
                }
    					}else if(res==3){
    						alert('비밀번호가 틀렸습니다.');
    					} 
    					
    				},
    				error:function(xhr,status,error){
    					alert("Error : "+status+", "+error);
    				}
    			});
        });

        
      });
    </script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">

                <h4>안녕하세요!</h4>
                <h6 class="font-weight-light">계속 진행하기위해 로그인해주세요.</h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="아이디" name="userid" value="<?=$_COOKIE['chk_userid']?>">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="비밀번호" name="userpw">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="buttion" id='btn'>로그인</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"
                        <?php
                            if(count($_COOKIE)>0){
                              echo "checked='checked'";
                            }
                        ?>
                         name="chkSave"> 아이디 저장 </label>
                    </div>
                    <a href="#" class="auth-link text-black">비밀번호를 잊어버리셨어요?</a>
                  </div>

                  <div class="text-center mt-4 font-weight-light"> 아이디가 없나요? <a href="/register.php" class="text-primary">가입하기</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src='/resources/assets/vendors/js/vendor.bundle.base.js' ></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src='/resources/assets/js/off-canvas.js' ></script>
    <script src='/resources/assets/js/hoverable-collapse.js' ></script>
    <script src='/resources/assets/js/misc.js' ></script>
    <!-- endinject -->
  </body>
</html>