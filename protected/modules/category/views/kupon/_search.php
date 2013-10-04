<?php
/* @var $this KuponController */
/* @var $model Kupon */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shop_id'); ?>
		<?php echo $form->textField($model,'shop_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'translit_url'); ?>
		<?php echo $form->textField($model,'translit_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promokod'); ?>
		<?php echo $form->textField($model,'promokod',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'finish_date'); ?>
		<?php echo $form->textField($model,'finish_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_url'); ?>
		<?php echo $form->textField($model,'img_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'categorry_id'); ?>
		<?php echo $form->textField($model,'categorry_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title_tag'); ?>
		<?php echo $form->textField($model,'title_tag',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_tag'); ?>
		<?php echo $form->textField($model,'description_tag',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords_tag'); ?>
		<?php echo $form->textField($model,'keywords_tag',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'show'); ?>
		<?php echo $form->textField($model,'show'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'offer_id'); ?>
		<?php echo $form->textField($model,'offer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'use_count'); ?>
		<?php echo $form->textField($model,'use_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'partner_id'); ?>
		<?php echo $form->textField($model,'partner_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->