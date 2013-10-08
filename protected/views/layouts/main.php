<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<?php
 if (!empty($this->pageCategoryTitle))
{
  echo "<title> $this->pageCategoryTitle - скидки и промокоды в Киеве и Украине </title>";
}
else if (!empty($this->pageTitle))
{echo "<title> $this->pageTitle </title>";}
else
 {  
 $settings=Settings::model()->findByPk(1);
 $site_name=$settings->site_name;
 echo "<title>$site_name</title>";}
?>

<?php
 if (!empty($this->pageDescription))
{
  echo '<meta name="description" content="' . $this->pageDescription . '" />';
}
 
?>
 <meta name="keywords" content="<?php 
  if (!empty($this->pageKeywords))
{
echo $this->pageKeywords; }
 ?>">
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS
  ================================================== -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
	<?php 
							$settings=Settings::model()->findByPk(1);
							echo $settings->Google_Analitics_Code;
							?>
</head>

<body>
<div id="wrapper">
	<!--begain header-->
	<header>
    
			<div class="topHeader">
				<div class="container">


					

					<div class="pull-right">
					
						<form method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/site/search" class="siteSearch">
							<div class="input-append">
								<input type="text"  name="searchtext" class="span2" id="appendedInputButton" placeholder="Начните поиск...">
								<button class="btn" type="submit" name=""><i class="icon-search"></i></button>
							</div>
						</form><!--end form-->
					</div><!--end pull-right-->

				</div><!--end container-->
			</div><!--end topHeader-->

			<div class="subHeader">
				<div class="container">
					<div class="navbar">

						<div class="siteLogo pull-left">
							<h1><a href="<?php echo Yii::app()->homeUrl; ?>"><img src="<?php 
							$settings=Settings::model()->findByPk(1);
							
							echo Yii::app()->request->baseUrl; ?>/images/<?php  echo $settings->img_logo_url; ?>" alt="" height="35px"></a></h1>
						</div>
					    
				      <?php 
					  $home=Yii::app()->homeUrl;
					 if (strstr($_SERVER['REQUEST_URI'], '/kupon'))
					 {$a='active';} 
					 else {$a='';}
					 if (strstr($_SERVER['REQUEST_URI'], '/shop'))
					 {$b='active';} 
					 else {$b='';}
					$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions' => array( 'class' => 'nav'),
                    'items'=>array(
                        array('label'=>'Главная', 'url'=>($home)),
            	        array('label'=>'Промокоды', 'url'=>array('/kupon'),'itemOptions' => array( 'class' => $a)),
			         	array('label'=>'Магазины', 'url'=>array('/shop'),'itemOptions' => array( 'class' => $b)),
			         	//array('label'=>'Авторизироваться', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                         array('label'=>'Админка', 'url'=>array('/admin'), 'visible'=>Yii::app()->user->isAdmin),
			         	array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
                )); ?>
				      	
				      	
				      	</ul><!--end nav-->

					</div>
				</div><!--end container-->
			</div><!--end subHeader-->
		</header>
		<!-- end header -->
   
	
<div class="container">
<div class="row">
            <?php echo $content;  ?>
	<div class="clear"></div>
    </div>
    </div><!--end container-->
	<footer>
	
		<div class="container">
				<div class="row">
	<div class="span12">
					<ul class="payments inline pull-right">
						<li class="visia"></li>
						<li class="paypal"></li>
						<li class="electron"></li>
						<li class="discover"></li>
					</ul>
				</div>
			</div>
	</div>
		</footer>
        </div>
  <?php 
							echo $settings->Yandex_Metrika_Code;
							?>          
							</div>
</body>
</html>
