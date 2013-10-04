<?php
/* @var $this KuponController */
/* @var $data Kupon */
?>

<div class="view">
<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />
<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->KuponType->name); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('categorry_id')); ?>:</b>
	<?php echo CHtml::encode($data->kategoriya->name); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('shop_id')); ?>:</b>
	<?php echo CHtml::encode($data->shop->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promokod')); ?>:</b>
	<?php echo CHtml::encode($data->promokod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finish_date')); ?>:</b>
	<?php echo CHtml::encode($data->finish_date); ?>
	<br />
<b><?php echo CHtml::encode($data->getAttributeLabel('date_create')); ?>:</b>
	<?php echo CHtml::encode($data->date_create); ?>
	<br />
	<?php 
			$shop=$data->shop->name;
			//echo $shop;
if (strlen($data->img_url)>1)
			{echo $this->post_image($data->id, $data->img_url, '150','small_img left');}
			else
			{
			$shop_img=Shop::model()->FindByAttributes(array('name'=>"$shop"));
			//echo $shop_img->image;
	echo $this->post_image($data->id, $shop_img->image, '150','small_img left');}
	
	?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('img_url')); ?>:</b>
	<?php echo CHtml::encode($data->img_url); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_create')); ?>:</b>
	<?php echo CHtml::encode($data->date_create); ?>
	<br />
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_tag')); ?>:</b>
	<?php echo CHtml::encode($data->title_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_tag')); ?>:</b>
	<?php echo CHtml::encode($data->description_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords_tag')); ?>:</b>
	<?php echo CHtml::encode($data->keywords_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show')); ?>:</b>
	<?php echo CHtml::encode($data->show); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('offer_id')); ?>:</b>
	<?php echo CHtml::encode($data->offer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_count')); ?>:</b>
	<?php echo CHtml::encode($data->use_count); ?>
	<br />



	

	*/ ?>

</div>