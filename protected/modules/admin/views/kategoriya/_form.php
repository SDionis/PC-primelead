<?php
/* @var $this KategoriyaController */
/* @var $model Kategoriya */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategoriya-form',
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
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>


<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php
echo $form->dropDownList($model,'parent_id', 
Kategoriya::AllParents(),
array('empty' => '(Выберите категорию)',
'class'=>'droplist',)
);?>       
<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'translit_url'); ?>
		<?php echo $form->textField($model,'translit_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'translit_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->