<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Shoppest: eCommerce Website</title>
	<meta name="description" content="">
	<meta name="author" content="Ahmed Saeed">
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" media="screen">
	<!-- jquery ui css -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.1.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/customize.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
	<!-- fancybox -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.css">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome-ie7.css">
	<![endif]-->
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>
<body>
<div id="header" style="border: 1px dashed #ddd;">	
		<div class="main_container">
			<h1 style="margin: 2px;"><?php echo $model->name; ?></h1>
			<div id="logo">
				<img alt="Shoppest" src="<?php
$settings=Settings::model()->findByPk(1);
				echo Yii::app()->request->baseUrl; ?>/images/<?php  echo $settings->img_logo_url; ?>"></img>
			</div>
			
			<div id="couponcode">
				<h3 class="coupon" style="color: #fff; font-size: 11pt; margin: 0; padding: 0; text-align: center;">Ваш промокод:</h3>
				<div style="text-align:center;  margin: 0; ">
					<div class="frm_code" style="width: 220px; margin: 5px auto;"><?php echo $model->promokod; ?><!--**СКИДКА**--></div>	
				</div>
			</div>
			
			<div class="frm_likes" >
				<strong class="title">
					Поделитесь купоном с друзьями
                </strong>
                <div class="links">
					<div class="share42init"></div>
					<script type="text/javascript" src="http://vamskidka.com.ua/wp-content/themes/kupon/share42/share42.js"></script> 
                </div>
            </div>		
            
			<span class="close_promoskidki" onclick="document.getElementById('header').style.display='none';document.getElementById('frmtbl').style.top='0px';document.getElementById('frmShop').style.height=(window.innerHeight-10)+'px';">
				Закрыть окно <span style="font-size: 13px; font-weight:bold;">X</span>
            </span>
			
		</div>
	
</div>	


                <table align="center" id="frmtbl" width="100%" style="position:absolute;top:100px;">
                        <tr>
                            <td align="center">
                                <iframe id="frmShop" scrolling="1" noresize="0" width="100%" frameborder="0" src="<?php 
								$offer_id=$model->offer_id;
								$settings=Settings::model()->findByPk(1);
								$partner_id=$settings->partner_id;
								echo "http://primeadv.go2cloud.org/aff_c?offer_id=$offer_id&aff_id=$partner_id"; ?> style="height:700px">Ваш браузер не поддерживает плавающие фреймы!</iframe>
                            </td>
                        </tr>
                        </table>
                        <script type="text/javascript">
                            document.getElementById('frmShop').style.height=(window.innerHeight-140)+'px';
                        </script>

	</body>
	
				</body>
				</html>



