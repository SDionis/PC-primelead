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
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'site_name'); ?>
		<?php echo $form->textField($model,'site_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_admin'); ?>
		<?php echo $form->textField($model,'email_admin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email_admin'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'site_description'); ?>
		<?php echo $form->textArea($model,'site_description',array('rows'=>10, 'cols'=>45)); ?>
		<?php echo $form->error($model,'site_description'); ?>
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
	
		<div class="row">
		<?php echo $form->labelEx($model,'img_logo_url'); ?>
		<?php echo $form->textField($model,'img_logo_url',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'img_logo_url'); ?>
	</div>
	
	
<div class="row">
		 <?php echo $form->labelEx($model,'logo_icon'); ?>
  <?php // Вывод уже загруженной картинки или изображения No_photo
    echo $this->post_logo($model->ID, $model->img_logo_url, '20','small_img left');?>
    <br clear="all">
    <?php //Если картинка для данного товара загружена, предложить её удалить, отметив чекбокс 
      if(isset($model->img_logo_url) && file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.'/images/'.$model->img_logo_url)){
        echo $form->checkBox($model,'del_logo',array('class'=>'span-1'));
        echo $form->labelEx($model,'del_logo',array('class'=>'span-2'));
      }?>
    <br />
    <?php //Поле загрузки файла 
      echo CHtml::activeFileField($model, 'logo_icon'); ?>
		
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'Google_Analitics_Code'); ?>
		<?php echo $form->textArea($model,'Google_Analitics_Code',array('rows'=>10, 'cols'=>45)); ?>
		<?php echo $form->error($model,'Google_Analitics_Code'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Yandex_Metrika_Code'); ?>
		<?php echo $form->textArea($model,'Yandex_Metrika_Code',array('rows'=>10, 'cols'=>45)); ?>
		<?php echo $form->error($model,'Yandex_Metrika_Code'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->