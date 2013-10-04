<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'partner_id'); ?>
		<?php echo $form->textField($model,'partner_id'); ?>
		<?php echo $form->error($model,'partner_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_login'); ?>
		<?php echo $form->textField($model,'admin_login',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'admin_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_user'); ?>
		<?php echo $form->textField($model,'admin_user',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'admin_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_new_kupons'); ?>
		<?php echo $form->textField($model,'main_new_kupons'); ?>
		<?php echo $form->error($model,'main_new_kupons'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_popular_kupons'); ?>
		<?php echo $form->textField($model,'main_popular_kupons'); ?>
		<?php echo $form->error($model,'main_popular_kupons'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->