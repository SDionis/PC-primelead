<?php
/* @var $this KuponController */
/* @var $data Kupon */
?>
	<div class="span9">
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
											
									<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'translit_url'=>$data->translit_url), array('class'=>'invarseColor')); ?>
											
											
											</h3>
										</div>
										<div class="thumbPriceRate clearfix">
											<span><span class="strike-through">До конца осталось</span><?php
	$date2=$data->finish_date;
	$date1=$data->date_create;
	$diff = strtotime($date2) - strtotime($date1);
	 $times = array();
    
    // считать нули в значениях
    $count_zero = false;
    
    // количество секунд в году не учитывает високосный год
    // поэтому функция считает что в году 365 дней
    // секунд в минуте|часе|сутках|году
    $periods = array(60, 3600, 86400, 31536000);
    
    for ($i = 3; $i >= 0; $i--)
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
    {
        echo $times[$i] . ' ' . $times_values[$i] . ' ';
    }
											?></span>
											
										</div>
										<div class="thumbDesc">
											<p>
											<?php echo CHtml::encode($data->description); ?> [ <a href="#" data-title="Read More" data-tip="tooltip" data-placement="top">...</a> ]
											</p>
										</div>

										<div class="thumbButtons">
											<button class="btn btn-primary btn-small">
												Посмотреть
											</button>
											
										</div><!--end thumbButtons-->
									</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					

				

				</div><!--end span9-->
