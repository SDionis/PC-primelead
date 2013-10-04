<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Акции дня';
$this->breadcrumbs=array(
	'Акции дня',
);
?>
<h1>Акции дня</h1>

<?php
$model=Kupon::model()->FindAll('id>:id', array(':id'=>'1'));
foreach($model AS $stroka)
 { ?><div class="view">
<b><?php echo CHtml::encode($stroka->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($stroka->id), array('view', 'id'=>$stroka->id)); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($stroka->name); ?>
	<br />
<b><?php echo CHtml::encode($stroka->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($stroka->KuponType->name); ?>
	<br />
	<b><?php echo CHtml::encode($stroka->getAttributeLabel('categorry_id')); ?>:</b>
	<?php echo CHtml::encode($stroka->kategoriya->name); ?>
	<br />
	<b><?php echo CHtml::encode($stroka->getAttributeLabel('shop_id')); ?>:</b>
	<?php echo CHtml::encode($stroka->shop->name); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($stroka->description); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('promokod')); ?>:</b>
	<?php echo CHtml::encode($stroka->promokod); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('finish_date')); ?>:</b>
	<?php echo CHtml::encode($stroka->finish_date); ?>
	<br />
<b><?php echo CHtml::encode($stroka->getAttributeLabel('date_create')); ?>:</b>
	<?php echo CHtml::encode($stroka->date_create); ?>
	<br />
	

	<?php /*
	<b><?php echo CHtml::encode($stroka->getAttributeLabel('img_url')); ?>:</b>
	<?php echo CHtml::encode($stroka->img_url); ?>
	<br />

	

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('date_create')); ?>:</b>
	<?php echo CHtml::encode($stroka->date_create); ?>
	<br />
	

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('title_tag')); ?>:</b>
	<?php echo CHtml::encode($stroka->title_tag); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('description_tag')); ?>:</b>
	<?php echo CHtml::encode($stroka->description_tag); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('keywords_tag')); ?>:</b>
	<?php echo CHtml::encode($stroka->keywords_tag); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('show')); ?>:</b>
	<?php echo CHtml::encode($stroka->show); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('offer_id')); ?>:</b>
	<?php echo CHtml::encode($stroka->offer_id); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('use_count')); ?>:</b>
	<?php echo CHtml::encode($stroka->use_count); ?>
	<br />

	<b><?php echo CHtml::encode($stroka->getAttributeLabel('partner_id')); ?>:</b>
	<?php echo CHtml::encode($stroka->partner_id); ?>
	<br />

	

	*/ ?>

</div><?php }
 ?>
