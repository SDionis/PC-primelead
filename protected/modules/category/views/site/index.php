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
										<button class="btn btn-mini">View All</button>
									</div>
								</div><!--end btn-toolbar-->
							</div><!--end pagers-->
						</div><!--end titleHeader-->

						<div class="row">
							<ul class="hProductItems clearfix">
			<?php	$model=Kupon::model()->FindAll('id>:id', array(':id'=>'1'));
foreach($model AS $stroka)
 { $model_shop=Shop::model()->FindByPk($stroka->shop_id);
?>
								<li class="span3 clearfix">
									<div class="thumbnail">
										<a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php  echo $stroka->img_url; ?>" alt=""></a>
									</div>
									<div class="thumbSetting">
										<div class="thumbTitle">
											<h3>
											<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kupon/<?php echo $stroka->id; ?>" class="invarseColor"><?php echo CHtml::encode($stroka->name); ?></a>
											</h3>
										</div>
									
										<div class="product-desc">
											<p>
												Praesent ac condimentum felis. Nulla at nisl orci, at dignissim dolor raesent ac condimentum felis...
											</p>
										</div>
									

										<div class="thumbButtons">
											<button class="btn btn-primary btn-small btn-block">
												ПОСМОТРЕТЬ
											</button>
										</div>
									</div>
								</li>
								
								
                                <?php } ?>
							</ul>
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
										<button class="btn btn-mini">View All</button>
									</div>
								</div><!--end btn-toolbar-->
							</div><!--end pagers-->
						</div><!--end titleHeader-->
						

						<div class="row">
							<ul class="hProductItems clearfix" id="cycleFeatured">
	<?php	$model=Kupon::model()->FindAll('id>:id', array(':id'=>'1'));
foreach($model AS $stroka)
 { $model_shop=Shop::model()->FindByPk($stroka->shop_id);
?>
								<li class="span3 clearfix">
									<div class="thumbnail">
										<a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php  echo $stroka->img_url; ?>" alt=""></a>
									</div>
									<div class="thumbSetting">
										<div class="thumbTitle">
											<h3>
											<a href="#" class="invarseColor"><?php echo CHtml::encode($stroka->name); ?></a>
											</h3>
										</div>
									
										<div class="product-desc">
											<p>
												Praesent ac condimentum felis. Nulla at nisl orci, at dignissim dolor raesent ac condimentum felis...
											</p>
										</div>
									

										<div class="thumbButtons">
											<button class="btn btn-primary btn-small btn-block">
												ПОСМОТРЕТЬ
											</button>
										</div>
									</div>
								</li>
							<?php } ?>
							
							</ul>
						</div><!--end row-->
					</div><!--end featuredItems-->
				</div><!--end span12-->
			</div><!--end row-->


			<div class="row">
				<div class="span12">
					<div class="brands">
						<div class="titleHeader clearfix">
							<h3>БРЕНДЫ</h3>
							<div class="pagers">
								<div class="btn-toolbar">
									<button class="btn btn-mini">View All</button>
								</div>
							</div>
						</div><!--end titleHeader-->
						<ul class="brandList clearfix">
							<li>
								<a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Layer-4.png" alt="logo"></a>
							</li>
							<li>
								<a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Layer-1.png" alt="logo"></a>
							</li>
							<li>
								<a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Layer-3.png" alt="logo"></a>
							</li>
							<li>
								<a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Layer-2.png" alt="logo"></a>
							</li>
						</ul>
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