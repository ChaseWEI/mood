<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>陌生 Mood</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->


  </head>

  <body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.2.min.js"></script>
    <script src='js/javascript.js'></script>
<?php
  require_once 'functions.php';
  echo <<<_END
  <script>
    function checkEmail(email)
    {
      if (email.value == '')
      {
        O('info').innerHTML = ''
        return
      }
      params  = "email=" + email.value
      request = new ajaxRequest()
      request.open("POST", "checkEmail.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              setEmailBorder (this.responseText);
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }

    function setEmailBorder (isTaken)
    {
      if (isTaken == "1")
        $("#email").css("border-color", "red")
      else 
        $("#email").css("border-color", "white")
    }

    function checkPassword(confirm_password)
    {
      if (confirm_password.value != O("password").value) 
      {
        $("#confirm_password").css("border-color", "red")
      }
      else
      {
        $("#confirm_password").css("border-color", "white")
      }
    }
  </script>
_END;

  $error = $email = $password = $name = $birthday = $sex = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['email']))
  {
    $email = sanitizeString($_POST['email']);
    $password = sanitizeString($_POST['password']);
    $name = sanitizeString($_POST['name']);
    $birthday = sanitizeString($_POST['birthday']);
    //echo("<script>alert('".$_POST['sex']."');</script>");

    if ($sex == "male") $sex = 0;
    else $sex = 1;

    if (empty($email) || empty($password) || empty($name) || empty($birthday))
    {
      $error = "Not all fields were entered";
      echo("<script>alert('".$error."');</script>");
    }
    else
    {
      $result = queryMysql("SELECT * FROM users WHERE email='$email'");

      if ($result->num_rows){
        $error = "That email already exists";
        echo("<script>alert('".$error."');</script>");
      }
      else
      {
        queryMysql("INSERT INTO users VALUES(DEFAULT, '$email', '$password', '$name', '$birthday', '$sex')");
        echo("<script>alert('Success');</script>");
        header('Refresh:1; url=login.php');
        die;
      }
    }
  }
?>


    <div class="row" id="section4">
      <div class="col-md-12 col-sm-12 col-xs-12">
    	<img src="source/reglog4.png" width="100%" height="100%" alt=""/>
        <div class="container" id="registerContainer">
        	<div class="row">
            	<div class="col-md-4 col-sm-6 col-xs-12"></div>
                	<div class="col-md-4 col-sm-12 col-xs-12">
                		<img src="source/data.png" width="100%" alt="" /><br>  
                	</div>
                <div class="col-md-4 col-sm-6 col-xs-12"></div>  
            </div>
            <form method="post" action="register_data.php">
    			<div class="row">
                	<div class="col-md-4 col-sm-6 col-xs-12" id="datali"></div>
                    <div class="col-md-4 col-sm-12 col-xs-12 datacontain">
                      <div id="info"></div>
                    	<div class="row datali">
                            <div class="col-md-6 col-sm-6 col-xs-12 datali2">性　　別</div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<label><input type="radio" name="sex" value="male" id="sex_male" checked="true">男</label>　
        						<label><input type="radio" name="sex" value="female" id="sex_female">女</label>
                            </div>
                        </div>
                         <br>   
                        <div class="row datali">姓　　名</div>
                    	<div class="row"><input type="text" name="name" class="form-control loginbtn2"></div>
                        <div class="row datali">生　　日</div>
                    	<div class="row"><input type="date" name="birthday" class="form-control loginbtn2" value="2015-12-02" min="1900-01-01" max="2015-12-02"></div>
                        <div class="row datali">信　　箱</div>
                    	<div class="row"><input type="email" id="email" name="email" class="form-control loginbtn2" placeholder="your email" onBlur='checkEmail(this)'></div>
                        <div class="row datali">密　　碼</div>
                    	<div class="row"><input type="password" id="password" name="password" class="form-control loginbtn2" placeholder="your password"></div>
                        <div class="row datali">確認密碼</div>
                    	<div class="row"><input type="password" id="confirm_password" name="confirm_password" class="form-control loginbtn2" placeholder="confirm password" onBlur='checkPassword(this)'></div>
    				</div>
                    <div class="col-md-4 col-sm-6 col-xs-12"></div></div>
    			<br>
                <div class="row">
                	<div class="col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                    	<button type="submit" class="btn btn-md enterBtn">註冊</button>   
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12"></div>          		
              	</div>
            </form>
		</div>
      </div>
    </div>
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
    
    <script>
    $(document).ready(function(){
    		$(".enterBtn").click(function(){
        	//alert("註冊成功!");
    		});
		})
    </script>
    
    
  </body>
</html>