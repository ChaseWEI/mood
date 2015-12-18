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
    <script src="js/test.js"></script>
    
    
<script> 
$(document).ready(function(){
    $("#slidbtn").click(function(){
        $("#slide").slideToggle(3000);
    });
});
</script>

<?php
  require_once 'functions.php';

  $error = $user = $pass = "";

  if (isset($_POST['email']))
  {
    $email = sanitizeString($_POST['email']);
    $password = sanitizeString($_POST['password']);
    
    if (empty($email) || empty($password)){
        $error = "Not all fields were entered";
        echo("<script>alert('".$error."');</script>");
    }
    else
    {
      $result = queryMySQL("SELECT email,password FROM users
        WHERE email='$email' AND password='$password'");

      if ($result->num_rows == 0)
      {
        //$error = "<span class='error'>Username/Password
                  //invalid</span><br><br>";
        echo ("<script>alert('Username/Password invalid')</script>");
      }
      else
      {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo("<script>alert('Success');</script>");
        header('Refresh:1; url=index.html');
        die;
      }
    }
  }
?>
    
      <div class="row" id="section1">
    	<div class="col-md-12 col-sm-12 col-xs-12">
        
			<div class="homepage-hero-module">
    			<div class="video-container">
        			<div class="filter"></div>
        			<video autoplay loop class="fillWidth">
            			<source src="MP4/login.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
            			<source src="WEBM/login.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        			</video>
        		<div class="poster hidden">
           			<img src="Snapshots/login.png" alt="">
        		</div>
    			</div>
    		</div>
            <img class="regback" src="source/reglog1.png" width="100%" height="100%" alt=""/>
          
          <div class="container" id="homecontainer">
			<div class="row">
            	<div class="col-md-4 col-sm-6 col-xs-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12"><p id="text">你好，陌聲人</p></div>
                <div class="col-md-4 col-sm-6 col-xs-12"></div>
			</div>
            <form method="post" action="login.php">
                <div class="row">
                	<div class="col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                    	<br><input type="email" name="email" class="form-control loginbtn" placeholder="輸入信箱"><br>
            			<input type="password" name="password" class="form-control loginbtn" placeholder="輸入密碼"><br>                
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12"></div>
              	</div>
                <div class="row">
                	<div class="col-md-4 col-sm-6 col-xs-12"></div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                    	<button type="submit" class="btn btn-md enterBtn">開始</button><br><br><br><br><br><br>     
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12"></div>          		
              	</div>
            </form>
            
            <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                	<button id="slidbtn" type="button" class="btn btn-md enterBtn2"></button>     
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12"></div>  
            </div>
          </div>
          
          
    	</div>
    </div>
    
<div id="slide">
    <div class="row" id="section2">
    	<div class="col-md-12 col-sm-12 col-xs-12">
        <img class="regback2" src="source/reglog2.png" width="100%" height="100%" alt=""/>
        <div class="container stepcon">
               
        	<div class="row">
            	<div class="col-md-4 col-sm-6 col-xs-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12"><img src="source/step.png" width="100%" height="100%" alt="" /><br><br> </div>
                <div class="col-md-4 col-sm-6 col-xs-12"></div>          		
          	</div>
            
        <div class="row">
        
        <div class="col-md-4 col-sm-6 col-xs-12"><img src="source/icon03.gif" width="55%" alt="" /></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><img src="source/icon02.gif" width="55%" alt="" /></div>
        <div class="col-md-4 col-sm-6 col-xs-12"><img src="source/icon01.gif" width="55%" alt="" /></div>
        </div>
            
            <div class="row" id="usecolor">
            	<div class="col-md-4 col-sm-6 col-xs-12">仔細閱讀<br>使用說明及使用條款</div>
                <div class="col-md-4 col-sm-12 col-xs-12">填入正確<br>的基本資料以便系統運作</div>
                <div class="col-md-4 col-sm-6 col-xs-12">開始寫信囉!</div>          		
          	</div>             
        </div>
       </div>
    </div>
    
    <div class="row" id="section3">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <img class="regback2" src="source/reglog3.png" width="100%" height="100%" alt=""/>
		<div class="container" id="registernextContainer">
        	<div class="row">
            	<div class="col-md-4 col-sm-6 col-xs-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12"><img src="source/use.png" width="60%" alt="" /><br></div>
                <div class="col-md-4 col-sm-6 col-xs-12"></div>          		
          	</div>
			
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" >
                	<textarea id="legaltext" readonly>網站所有權及使用條款協議
本使用條款之內容適用於 PH9.0 位於 www.PH9o0.com/tw 的網站，及所有由 PH9.0 及其從屬公司連結至 www.PH9o0.com/tw 之網站，包括 PH9.0 遍及全球之網站。(合稱為 "本網站")。藉由使用此網站，將視為您已同意本使用條款之內容; 如果您不同意，請勿使用此網站。
1. 網站合法授權使用：
當您進入並使用本網站時，即表示您已同意有關為保障合法或其他目的之系統監視執行；任何非經合法授權使用本網站之行為均可能使您遭致刑事起訴或罰款制裁。
2. 用戶同意接受本「使用條款」：當您進入並使用本網站，即視同您已同意遵守本「使用條款」與其他有關著作權、版權、商標專用權、網路智慧財產權、隱私權等之法律規定。
3. 本中心保留權利：
本中心得不定時增刪修改網頁資訊內容，或變更網頁服務功能，無需事先或另行通知用戶；亦得不定時修訂本「使用條款」，並於網站張貼時隨即生效，無需事先或另行通知用戶或對用戶負擔任何責任；本中心並保留限制進出網站之權利。
用戶須遵守之規則：
本中心之電腦系統與網路通訊相關資源，包括(但不限於)本中心之所有電腦設備、週邊系統、伺服器、所有連接之網路、及資料、資訊、報告、相片、圖像、圖表、程式、與相關之儲存媒體如磁帶、磁碟、硬碟、光碟、記憶卡等在內之網站內容之著作權及一切專屬權利均屬於「財團法人聯合信用卡處理中心」及任何相關第三方（如適用）的財產；用戶進入並使用本中心信用卡作業服務系統及資訊時，應遵守以下規定：
(1). 用戶不得利用本中心網站電腦系統、網路通訊相關資源、或提供之服務從事違法之行為；不得藉由本中心網站進行任何恐嚇、誹謗、騷擾、冒犯他人之活動，或其他任何犯罪行為；
(2). 本中心網站存用、顯示之資料與內容，包括企業標誌、商標、服務標章等一切智慧財產權屬於「財團法人聯合信用卡處理中心」及任何相關第三方（如適用）的財產；用戶未經授權不得企圖使用、存取、或使用儲存於本中心系統之資料或程式；亦不得傳播、複製、修改、發佈或傳送；
(3). 用戶不得進行任何不利於本網站、可能對網路正常傳輸造成不利影響的行為；亦不得將外來之資料儲存於本中心之任何系統或電腦媒體上；
(4). 用戶不得拷貝系統、或檔案供未經授權之本人或其他任何人使用；
(5). 用戶不得下載、安裝或執行任何足以揭露本中心電腦系統或網路機密資訊之程式；
(6). 用戶不得竊取他人於本中心之用戶帳號；不得非法或未授權而取得額外之系統或網路資源；
(7). 用戶不得向本中心網站輸入或上載任何含有病毒、或其他意圖損害、干擾、降低本中心之系統或網路效率或相關之服務品質之電腦程式路徑。
4. 有限責任與免責聲明：
(1). 本中心盡力維護本網站所提供之服務，並確保資料之正確性，但對於服務提供有關之暇疵或不能，或因該暇疵或不能所造成之直接或間接損害，本中心不負任何責任。
(2). 用戶明確瞭解並同意，任何因使用、或無法使用本中心網站服務所造成之直接、間接、偶發、特殊、連帶、或懲戒性損害賠償，包括但不限於獲利損失、資料損失、名譽損害、或其他無形損失等，本中心不負任何損害賠償責任。
5. 隱私權政策聲明：
本中心「隱私權政策」適用於本網站收集之用戶資料，及用戶提供給本網站之任何資訊，可能包括用戶基本資料、用戶如何使用本網站、用戶使用本網站之追蹤等；本中心可能運用此些資料於用戶聯絡、網站使用
研究調查、市場行銷研究等用途；並將遵守「個人資料保護法」之規範，保障用戶隱私權益，保證不對外公開，但事先獲得用戶明確授權、依據有關法律規章規定、應司法機關調查要求、為維護社會公眾利益、為維護本網站合法權益之情形，不在此限。
6. 違約賠償：
用戶違反本使用條款或其他相關之著作權法、民法、刑法法律規定，以致對本中心或其他任何第三者造成損失，用戶同意負擔由此造成之損害賠償責任。
7. 電子郵件經網際網路向本中心傳送電子郵件訊息，本中心並不保證其完全安全。若用戶經網際網路傳送訊息給本中心招致任何損失、或本中心按用戶的要求經網際網路向其發出訊息時導致用戶遭受任何損失，本中心概不負責。用戶因使用本網站而導致任何直接、間接、特殊或從屬等損失，本中心概不負責。
8. 法律管轄：
本「使用條款」適用中華民國法律。</textarea><br><br>
                </div>         		
          	</div>
            
			<div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                	<button type="button" class="btn btn-md enterBtn3" onclick="location.href='register_data.php'"></button>     
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12"></div>  
            </div>	

			
		</div>
      </div>
    </div>
     
</div>   
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
  </body>
</html>