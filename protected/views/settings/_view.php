<?php
/* @var $this SettingsController */
/* @var $data Settings */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partner_id')); ?>:</b>
	<?php echo CHtml::encode($data->partner_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_login')); ?>:</b>
	<?php echo CHtml::encode($data->admin_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_user')); ?>:</b>
	<?php echo CHtml::encode($data->admin_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_new_kupons')); ?>:</b>
	<?php echo CHtml::encode($data->main_new_kupons); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_popular_kupons')); ?>:</b>
	<?php echo CHtml::encode($data->main_popular_kupons); ?>
	<br />


</div>