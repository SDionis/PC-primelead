<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	$model->translit_url,
);

?>


	<div class="span9">
	<div class="row">
						<ul class="listProductItems clearfix">
							<li class="clearfix">
								<div class="span3">
									<div class="thumbnail">
										<a href="#"><?php if (strlen($model->image)>1)
			{echo $this->post_image($model->id, $model->image, '212');}?>
			</a>
									</div>
								</div>
								<div class="span6">
									<div class="thumbSetting">
										<div class="thumbTitle">
											<h1><?php echo $model->name; ?></h1>

										</div>
  
										
										<div class="thumbDesc">
											<p>
											<?php $text=$model->description;
									 echo $text; ?>
											</p>
										</div>

									
									</div>
									
								</div>
							</li>
						</ul>
					</div>
					<hr>
					<?php 
					$shop_id=$model->id;
					$Criteria = new CDbCriteria();
$Criteria->condition = "shop_id = $shop_id";
$Kupon= Kupon::model()->findAll($Criteria); 
if (!Empty($Kupon)) {?>
					<center><h3><b>Скидки от магазина <?php 
					
					echo $model->name; ?>:</b></h3></center>
					<?php 
					
foreach ($Kupon AS $data)
{?>


<div class="row">
						<ul class="listProductItems clearfix">
							<li class="clearfix">
								<div class="span3">
									<div class="thumbnail">
										<a href="#"><?php if (strlen($data->img_url)>1)
			{echo $this->post_image($data->id, $data->img_url, '212');}
			else
			{
			$shop_img=Shop::model()->FindByAttributes(array('name'=>"$shop"));
			//echo $shop_img->image;
	echo $this->post_image($data->id, $shop_img->image, '212');} ?></a>
									</div>
								</div>
								<div class="span6">
									<div class="thumbSetting">
										<div class="thumbTitle">
											<h3>
											
									<?php echo CHtml::link(CHtml::encode($data->name), array('category/kupon/view', 'translit_url'=>$data->translit_url), array('target'=>'_blank', 'class'=>'invarseColor')); ?>
											
											
											</h3>
										</div><?php
	$date2=$data->finish_date;
	//$date=date('Y-m-d H:i:s');
	
	$date1=date("Y-m-d H:i:s");
	$diff = strtotime($date2) - strtotime($date1);
	
	if ($diff>0)
	{$time_left="До конца осталось ";
	$a=1;
	}
	else {$time_left="Истек период действия акции";}
	
	 $times = array();
    
    // считать нули в значениях
    $count_zero = false;
    
    // количество секунд в году не учитывает високосный год
    // поэтому функция считает что в году 365 дней
    // секунд в минуте|часе|сутках|году
    $periods = array(60, 3600, 86400, 31536000);?>
    
  
										<div class="thumbPriceRate clearfix">
											<span><span class="strike-through"><?php echo $time_left; for ($i = 3; $i >= 0; $i--)
    {
        $period = floor($diff/$periods[$i]);
        if (($period > 0) || ($period == 0 && $count_zero))
        {
            $times[$i+1] = $period;
            $diff -= $period * $periods[$i];
            
            $count_zero = true;
        }
    }
    
    $times[0] = $diff;
	$times_values = array('сек.','мин.','час.','д.','лет');
	
	 for ($i = count($times)-1; $i >= 1; $i--)
    { if ($a==1)
       { echo $times[$i] . ' ' . $times_values[$i] . ' ';}
	 
    }
											?></span></span>
											
										</div>
										<div class="thumbDesc">
											<p>
											<?php $text=$data->description;
												  if (strlen($text)>250)
  {
      $text = substr ($text, 0,strpos ($text, " ", 250)); echo $text."...";
  }
  else echo $text; ?> [ <a href="#" data-title="Read More" data-tip="tooltip" data-placement="top">...</a> ]
											</p>
										</div>

										<div class="thumbButtons">
									
	<?php 
	$translit_url=$data->translit_url;

										$path=Yii::app()->request->baseUrl;
									

	echo CHtml::htmlButton('ПОСМОТРЕТЬ',  array('submit'=>'','onclick' => 'js:window.open("'.$path.'/kupon/'.urlencode($data->translit_url).'")','class'=>'btn btn-primary btn-small')); ?>

											
											
										</div><!--end thumbButtons-->
									</div>
									
								</div>
							</li>
						</ul>
					</div>




<?php }}?>
</div>
