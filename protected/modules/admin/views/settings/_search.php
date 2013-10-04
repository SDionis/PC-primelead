<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'partner_id'); ?>
		<?php echo $form->textField($model,'partner_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_login'); ?>
		<?php echo $form->textField($model,'admin_login',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_user'); ?>
		<?php echo $form->textField($model,'admin_user',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'main_new_kupons'); ?>
		<?php echo $form->textField($model,'main_new_kupons'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'main_popular_kupons'); ?>
		<?php echo $form->textField($model,'main_popular_kupons'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->