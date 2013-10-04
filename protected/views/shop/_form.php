<?php
/* @var $this ShopController */
/* @var $model Shop */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shop-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'translit_url'); ?>
		<?php echo $form->textField($model,'translit_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'translit_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_tag'); ?>
		<?php echo $form->textField($model,'title_tag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords_tag'); ?>
		<?php echo $form->textField($model,'keywords_tag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_tag'); ?>
		<?php echo $form->textField($model,'description_tag',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'description_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show'); ?>
		<?php echo $form->textField($model,'show'); ?>
		<?php echo $form->error($model,'show'); ?>
	</div>
	<div class="row">
		 <?php echo $form->labelEx($model,'icon'); ?>
  <?php // Вывод уже загруженной картинки или изображения No_photo
    echo $this->post_image($model->id, $model->image, '150','small_img left');?>
    <br clear="all">
    <?php //Если картинка для данного товара загружена, предложить её удалить, отметив чекбокс 
      if(isset($model->image) && file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.'/images/'.$model->image)){
        echo $form->checkBox($model,'del_img',array('class'=>'span-1'));
        echo $form->labelEx($model,'del_img',array('class'=>'span-2'));
      }?>
    <br />
    <?php //Поле загрузки файла 
      echo CHtml::activeFileField($model, 'icon'); ?>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->