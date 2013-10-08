<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>


</head>

<body>



		<div class="row">
		
				<div class="span12">

					<div id="featuredItems">
						
						<div class="titleHeader clearfix">
							<h3>НОВЫЕ КУПОНЫ</h3>
							<div class="pagers">
							
								<div class="btn-toolbar">
									<div class="btn-toolbar">
									<?php	
										
										$path=Yii::app()->request->baseUrl;
										echo CHtml::htmlButton('Открыть все',  array('submit'=>'','onclick' => 'js:window.open("'.$path.'/kupon")','class'=>'btn btn-mini')); ?>
									</div>
								</div><!--end btn-toolbar-->
							</div><!--end pagers-->
						</div><!--end titleHeader-->
	<div class="carousl">
<a href="#" class="arrow left-arrow" id="prev">&#8249; </a>
  <div class="galery">
						<div class="row">
						
							<ul class="hProductItems clearfix"  id="images">
							
			<?php	
			$settings=Settings::model()->findByPk(1);
$limit_new=$settings->main_new_kupons; 
$limit_popular=$settings->main_popular_kupons; 
			$Criteria = new CDbCriteria();
$Criteria->condition = "id > 1";
$Criteria->limit = $limit_new;
$model=Kupon::model()->FindAll($Criteria);
	
foreach($model AS $stroka)
 { $model_shop=Shop::model()->FindByPk($stroka->shop_id);
?>
								<li class="span3 clearfix">
									<div class="thumbnail">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/kupon/<?php echo $stroka->translit_url;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php  echo $stroka->img_url; ?>" alt=""></a>
									</div>
									<div class="thumbSetting">
										<div class="thumbTitle">
											<h3>
											<?php echo CHtml::link(CHtml::encode($stroka->name), array('kupon/name', 'translit_url'=>$stroka->translit_url), array('target'=>'_blank', 'class'=>'invarseColor')); ?>
											</h3>
										</div>
									
										<div class="product-desc">
											<p>
												<?php 
												$text=$stroka->description;
												  if (strlen($text)>125)
  {
      $text = substr ($text, 0,strpos ($text, " ", 125)); echo $text."...";
  }
  else echo $text;
												?>
											</p>
										</div>
									

										<div class="thumbButtons">
												<div class="thumbButtons">

										<?php	
										$path=Yii::app()->request->baseUrl;
										echo CHtml::htmlButton('ПОСМОТРЕТЬ',  array('submit'=>'','onclick' => 'js:window.open("'.$path.'/kupon/site/'.urlencode($stroka->translit_url).'")','class'=>'btn btn-primary btn-small btn-block')); 
										?>

										</div>
									</div>
								</li>
								
								
                                <?php } ?>
							</ul>
					
						</div><!--end row-->
								 </div>
<a href="#" class="arrow right-arrow" id="next">&#8250; </a>
</div>

						</div><!--end row-->
					</div><!--end featuredItems-->
				</div><!--end span12-->
			</div><!--end row-->

			<div class="row">
				<div class="span12">
					<div id="latestItems">
						
						<div class="titleHeader clearfix">
							<h3>ПОПУЛЯРНЫЕ КУПОНЫ</h3>
							<div class="pagers">
								<div class="btn-toolbar">
									<div class="btn-toolbar">
										<?php	
										
										$path=Yii::app()->request->baseUrl;
										echo CHtml::htmlButton('Открыть все',  array('submit'=>'','onclick' => 'js:window.open("'.$path.'/kupon")','class'=>'btn btn-mini')); ?>
									</div>
								</div><!--end btn-toolbar-->
							</div><!--end pagers-->
						</div><!--end titleHeader-->
					
	<div class="carousl">
<a href="#" class="arrow left-arrow" id="prev">&#8249; </a>
  <div class="galery">
						<div class="row">
							<ul class="hProductItems clearfix" id="cycleFeatured">
	<?php	$Criteria = new CDbCriteria();
$Criteria->condition = "id > 1";
$Criteria->limit = $limit_popular;
$model=Kupon::model()->FindAll($Criteria);
foreach($model AS $stroka)
 { $model_shop=Shop::model()->FindByPk($stroka->shop_id);
?>
								<li class="span3 clearfix">
									<div class="thumbnail">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/kupon/<?php echo $stroka->translit_url;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php  echo $stroka->img_url; ?>" alt=""></a>
									</div>
									<div class="thumbSetting">
										<div class="thumbTitle">
											<h3>
											<?php $base_url=Yii::app()->request->baseUrl;
											echo "<a class='invarseColor' title='$stroka->name' href='$base_url/kupon/$stroka->translit_url'  target='_blank'>$stroka->name</a>"; ?>
											
											</h3>
										</div>
									
										<div class="product-desc">
											<p>
											<?php	$text=$stroka->description;
												  if (strlen($text)>125)
  {
      $text = substr ($text, 0,strpos ($text, " ", 125)); echo $text."...";
  }
  else echo $text; ?>
											</p>
										</div>
									

										<div class="thumbButtons">
											<?php	$path=Yii::app()->request->baseUrl;
										echo CHtml::htmlButton('ПОСМОТРЕТЬ',  array('submit'=>'','onclick' => 'js:window.open("'.$path.'/kupon/site/'.urlencode($stroka->translit_url).'")','class'=>'btn btn-primary btn-small btn-block'));  ?>

										</div>
									</div>
								</li>
							<?php } ?>
							
							</ul>
								
						</div><!--end row-->
								 </div>
<a href="#" class="arrow right-arrow" id="next">&#8250; </a>
</div>
				
					</div><!--end featuredItems-->
				</div><!--end span12-->
			</div><!--end row-->


		<script>

/* этот код помечает картинки, для удобства разработки */
var lis = document.getElementsByTagName('li');
for(var i=0; i<lis.length; i++) {
  lis[i].style.position='relative';
  var span = document.createElement('span');
  // обычно лучше использовать CSS-классы,
  // но этот код - для удобства разработки, так что не будем трогать стили
  span.style.cssText='position:absolute;left:0;top:0';
  lis[i].appendChild(span);
}

/* конфигурация */
var width = 240; // ширина изображения
var count = 1; // количество изображений

var ul = document.getElementById('images');
var imgs = ul.getElementsByTagName('li');

var position = 0; // текущий сдвиг влево

document.getElementById('prev').onclick = function() {
  if (position >= 0) return false; // уже до упора

  // последнее передвижение влево может быть не на 3, а на 2 или 1 элемент
  position = Math.min(position + width*count, 0)
  ul.style.marginLeft = position + 'px';
  return false;
}

document.getElementById('next').onclick = function() {
  if (position <= -width*(imgs.length-count)) return false; // уже до упора

  // последнее передвижение вправо может быть не на 3, а на 2 или 1 элемент
  position = Math.max(position-width*count, -width*(imgs.length-count*4));
  ul.style.marginLeft = position + 'px';
  return false;
};

</script>
			<div class="row">
				<div class="span12">
					<div class="brands">
						<div class="titleHeader clearfix">
							<h3>Магазины</h3>
							<div class="pagers">
								<div class="btn-toolbar">
									<?php	
										
										$path=Yii::app()->request->baseUrl;
										echo CHtml::htmlButton('Открыть все',  array('submit'=>'','onclick' => 'js:window.open("'.$path.'/shop")','class'=>'btn btn-mini')); ?>
								</div>
							</div>
						</div><!--end titleHeader-->
							<div class="carousl">
  <div class="galery">
						<ul class="brandList clearfix">
						<?php 
							$Criteria = new CDbCriteria();
$Criteria->condition = "id > 1";
$model=Shop::model()->FindAll($Criteria);
						foreach ($model AS $stroka_shop)
						{?>
							<li>
								<a href="<?php echo Yii::app()->request->baseUrl; ?>/shop/<?php  echo $stroka_shop->translit_url; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php  echo $stroka_shop->image; ?>" alt="logo"></a>
							</li><?php } ?>
							</ul>
							 </div>
</div>
					</div><!--end brands-->
				</div><!--end span12-->
			</div><!--end row-->


	<!-- JS
	================================================== -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.2.min.js"></script>
	<!-- bootstrap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<!-- jQuery.Cookie -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js"></script>
    <!-- fancybox -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.js"></script>
    <!-- jquery.tweet -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tweet.js"></script>
    <!-- custom function-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
    
</body>

</html>