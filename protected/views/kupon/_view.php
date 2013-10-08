<?php
/* @var $this KuponController */
/* @var $data Kupon */
?>

					<div class="row">
						<ul class="listProductItems clearfix">
							<li class="clearfix">
								<div class="span3">
									<div class="thumbnail">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/kupon/<?php echo $data->translit_url;?>"><?php if (strlen($data->img_url)>1)
			{echo $this->post_image($data->id, $data->img_url, '212');}
			else
			{
			$shop=$data->shop->name;
			$shop_img=Shop::model()->FindByAttributes(array('name'=>"$shop"));
			//echo $shop_img->image;
	echo $this->post_image($data->id, $shop_img->image, '212');} ?></a>
									</div>
								</div>
								<div class="span6">
									<div class="thumbSetting">
										<div class="thumbTitle">
											<h3>
											
									<?php echo CHtml::link(CHtml::encode($data->name), array('kupon/name', 'translit_url'=>$data->translit_url), array('target'=>'_blank', 'class'=>'invarseColor')); ?>
											
											
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
	$link=Yii::app()->request->baseUrl;
	$translit_url=$data->translit_url;
	echo CHtml::htmlButton('ПОСМОТРЕТЬ',  array('submit'=>'','onclick' => 'js:window.open("'.$link.'/kupon/site/'.urlencode($data->translit_url).'")','class'=>'btn btn-primary btn-small')); ?>

											
											
										</div><!--end thumbButtons-->
									</div>
									
								</div>
							</li>
						</ul>
					</div>
					

				

			
