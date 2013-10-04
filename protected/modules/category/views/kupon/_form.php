<?php
/* @var $this KuponController */
/* @var $model Kupon */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kupon-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>
	
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php
echo $form->dropDownList($model,'type_id', 
KuponType::All(),
array('empty' => '(Выберите тип купона)')
);?>       
<?php echo $form->error($model,'type_id'); ?>
</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categorry_id'); ?>
		<?php
echo $form->dropDownList($model,'categorry_id', 
Kategoriya::All(),
array('empty' => '(Выберите категорию)')
);?>       
<?php echo $form->error($model,'categorry_id'); ?>
</div>
	<div class="row">
		<?php echo $form->labelEx($model,'shop_id'); ?>
		<?php
echo $form->dropDownList($model,'shop_id', 
Shop::All(),
array('empty' => '(Выберите магазин)')
);?>       
<?php echo $form->error($model,'shop_id'); ?>
</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'offer_id'); ?>
		<?php echo $form->textField($model,'offer_id'); ?>
		<?php echo $form->error($model,'offer_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'translit_url'); ?>
		<?php echo $form->textField($model,'translit_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'translit_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'promokod'); ?>
		<?php echo $form->textField($model,'promokod',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'promokod'); ?>
	</div>

		
	
	<div class="row">
		<?php echo $form->labelEx($model,'finish_date'); ?>
		<?php echo $form->textField($model,'finish_date'); ?>
		<?php echo $form->error($model,'finish_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
		<?php echo $form->error($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_url'); ?>
		<?php echo $form->textField($model,'img_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img_url'); ?>
	</div>
    
    	<div class="row">
		<?php echo $form->labelEx($model,'kupon_url'); ?>
		<?php echo $form->textField($model,'img_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kupon_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_tag'); ?>
		<?php echo $form->textField($model,'title_tag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_tag'); ?>
		<?php echo $form->textField($model,'description_tag',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'description_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords_tag'); ?>
		<?php echo $form->textField($model,'keywords_tag',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'keywords_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show'); ?>
		<?php echo $form->textField($model,'show'); ?>
		<?php echo $form->error($model,'show'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'use_count'); ?>
		<?php echo $form->textField($model,'use_count'); ?>
		<?php echo $form->error($model,'use_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'partner_id'); ?>
		<?php echo $form->textField($model,'partner_id'); ?>
		<?php echo $form->error($model,'partner_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->