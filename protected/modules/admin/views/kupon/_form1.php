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
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>
	
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'categorry_id'); ?>
		<?php 
		$prompt="Выберите категорию";
		echo CHtml::activeDropDownList($model,
     'categorry_id',
     CHtml::listData(Kategoriya::model()->findAll(array('condition'=>'parent_id=0', 'order'=>'name ASC')), 'id', 'name'),
     array('prompt'=>"$prompt",
	 'class'=>'droplist',
          'onchange'=> CHtml::ajax(array('type'=>'POST',
               'url'=>CController::createUrl('podkategory'),
               'data' => array('uplevel_id' => 'js:$(this).val()'),
               'update'=> '#subcat_0',
			   ))
     )
);?>
<?php
$home=Yii::app()->request->baseUrl;
$text="   Добавить категорию";
 echo CHtml::link(CHtml::encode($text), $home."/admin/kategoriya/create", array('target'=>'_blank')); ?>
<div id="subcat_0">
		<?php echo CHtml::activeDropDownList($model,
     'categorry_id',
     CHtml::listData(Kategoriya::model()->findAll(array('condition'=>'parent_id>0', 'order'=>'name ASC')), 'id', 'name'),
     array('prompt'=>'Выберите категорию',
	 'class'=>'droplist',
          'onchange'=> CHtml::ajax(array('type'=>'POST',
               'url'=>CController::createUrl('podkategory'),
               'data' => array('uplevel_id' => 'js:$(this).val()'),
               'update'=> '#subcat_0',
			   ))
     )
);?>
</div>
<?php echo $form->error($model,'categorry_id'); ?>

</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'shop_id'); ?>
		<?php
echo $form->dropDownList($model,'shop_id', 
Shop::All(),
array('empty' => '(Выберите магазин)',
'class'=>'droplist',)
);?>       
<?php echo $form->error($model,'shop_id'); ?>
<?php
$text="Добавить магазин";
 echo CHtml::link(CHtml::encode($text), $home."/admin/shop/create", array('target'=>'_blank')) ;?>

</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php
echo $form->dropDownList($model,'type_id', 
KuponType::All(),
array('empty' => '(Выберите тип купона)',
'class'=>'droplist',));?>       
<?php echo $form->error($model,'type_id'); ?>
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
		<?php echo $form->textField($model,'finish_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'finish_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'date_create'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'kupon_url'); ?>
		<?php echo $form->textField($model,'kupon_url',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'kupon_url'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'img_url'); ?>
		<?php echo $form->textField($model,'img_url',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'img_url'); ?>
	</div>
	
	<div class="row">
		 <?php echo $form->labelEx($model,'icon'); ?>
  <?php // Вывод уже загруженной картинки или изображения No_photo
    echo $this->post_image($model->id, $model->img_url, '150','small_img left');?>
    <br clear="all">
    <?php //Если картинка для данного товара загружена, предложить её удалить, отметив чекбокс 
      if(isset($model->img_url) && file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.'/images/'.$model->img_url)){
        echo $form->checkBox($model,'del_img',array('class'=>'span-1'));
        echo $form->labelEx($model,'del_img',array('class'=>'span-2'));
      }?>
    <br />
    <?php //Поле загрузки файла 
      echo CHtml::activeFileField($model, 'icon'); ?>
		
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
	 <?php echo $form->checkBox($model,'show'); ?>
		<?php echo $form->error($model,'show'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'use_count'); ?>
		<?php echo $form->textField($model,'use_count',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'use_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->