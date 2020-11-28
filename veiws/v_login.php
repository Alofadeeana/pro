<?php

    include './include/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="descraption" content="<?php 
    echo $siteInfo['site_name']; ?>" />
    <meta name="keyWord" content="<?php echo $siteInfo['site_tags']; ?>" />
    <title><?php echo $siteInfo['site_name']; ?></title>
    <link rel="stylesheet" type="text/css" href="./resource/css/normalize.css">
    <link rel="stylesheet" href="./resource/css/style.css" type="text/css">
    <link rel="stylesheet" href="./resource/css/style2.css" type="text/css">
        
 </head>   
<body dir=rtl>
    <div id="header" class=" clear">
			<div id="head-warp" class="center clear">
				<div id="logo" >
					<h2>موقع حجز سيارات الاجرة</h2>
				</div>
			</div>
			
		</div><!-- end header -->
    <div id=""    class="clear">
        <div id="menu" class="center">
            <ul>
            </ul>
        </div><!-- end menu -->
    </div><!-- end intro -->
    <div id="containers" class="center clear">
        <div class="contents">
            <div class="login">
                <h1>تسجيل الدخول :</h1>
                <form class="form" action="" method="post">
                    
                    <span> ادخل اسم المستخدم و كلمة المرور  </span>
                    <p>____________________________________________</p>
                    اسم المستخدم : <input  required="required" name="username" class="input-lg"
                     type="text" placeholder="أكتب أسمك هنا  ">
                    كلمة المرور : <input required="required" name="password" class="input-lg"
                     type="password" placeholder="أكتب كلمة المرور هنا  ">
                    <input  class="btn-primary btn-lg" type="submit" name="Login" value="Login">
                    
                </form>
                <br>
            </div>
        </div>
    </div><!-- end containers -->
    <div id="footer">
    <div class="center clear">	
            <div id="copy-right">
                <p>جميع الحقوق محفوظة 2020</p>
                
            </div>
        </div><!-- end center -->
    </div><!-- end footer -->
</body>
</html>
