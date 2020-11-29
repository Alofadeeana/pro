<?php
    @session_start();
if(!isset($_SESSION['username']))
{
header('Location:loginControler1.php'); 
die();
}
    include './include/init.php';
    include './include/autoLoader.php';
    include './include/functions.php';
?>
<html charset="utf-8" class="clearfix clear">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<title>نظام قياس جودة الاثمدة</title>
<link rel="stylesheet" type="text/css" href="./resource/css/normalize.css">
<link rel="stylesheet" href="./resource/css/style.css" type="text/css">
<link rel="stylesheet" href="./resource/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="./resource/css/style2.css" type="text/css">
<link rel="stylesheet" href="./resource/css/jquery-ui.css">
<!-- Custom styles for this template-->
<link rel="stylesheet" href="./resource/css/bootstrap-datepicker.css" />
<script src="./resource/js/jquery.js"></script>
<script src="./resource/js/jquery-ui.js"></script>
<script src="./resource/js/time.js"></script>
<script src="./resource/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

 </head>   
<body dir=rtl>
 <div id="header" class=" clear">
			<div id="head-warp" class="center clear">
				<div id="logo" >
					<h2>موقع لحجز سيارات الاجره</h2>
				</div>
			</div>
			
		</div>
    <div id=""    class="clear">
    <div class="row">
        <div id="menu" class="center noprint col-md-3">
            <ul>
                <li><a  style=""  href="./index.php"><img src="./resource/images/home.png"><span>الصفحة الرئسية</span></a></li>
                <li><a  href="?page=factories">الشركه</a></li>
                <li><a  href="?page=asamda">السيارات</a></li>
                <li><a  href="?page=factory_orders">طلب الحجز   </a></li>
                <li><a  href="?page=reports">استعلام   </a></li>
                <?php
                if($_SESSION['username']=='admin')
                {
                    echo '<li><a href="?page=adduser">أضافة موظف</a><li>';
                }
                ?>
                <li><a href='?page=loginControler&info=log'> تسجيل خروج</a></li>
            </ul>
        </div><!-- end menu -->
    <div id="containers" class="center clear clearfix col-md-9" >
        
        <section id="page">
            
            <?php
            if(@$_GET['page'])
            {
                $url="./controlers/c_".$_GET['page'].".php";
                if(is_file($url))
                {
                    include $url;
                }
                else {
                    echo "Page snot found";
                }
            }
            else {
                include './controlers/c_main.php';
            }
            ?>
        </section>
    </div><!-- end containers -->
    </div>
    <div id="footer" class="clearfix clear">
        <div class="center">
            
            <div id="footer-link">
                    <a href="<?php echo $siteInfo['tw']; ?>"><img src="./resource/images/tw.png"></a>
                    <a href="<?php echo $siteInfo['g']; ?>"><img src="./resource/images/g.png"></a>
                    <a href="<?php echo $siteInfo['fb']; ?>"><img src="./resource/images/fb.png"></a>
                    
            </div><!-- end footer-link -->
            <div id="copy-right">جميع الحقوق محفوظة © 2019</div>
        </div><!-- end center -->
    </div><!-- end footer -->
    <script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });



 
});
function PrintDiv() { window.print();}	
</script>

</body>
</html>
