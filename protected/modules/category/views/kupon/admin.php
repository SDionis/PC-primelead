<?php
/* @var $this KuponController */
/* @var $model Kupon */

$this->breadcrumbs=array(
	'Kupons'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kupon', 'url'=>array('index')),
	array('label'=>'Create Kupon', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kupon-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Kupons</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kupon-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
'name' => 'shop_id',
'filter' => CHtml::listData(Shop::model()->findAll(), 'id', 'name'),
'value' => '$data->shop->name',
),
		'description',
		'translit_url',
		'promokod',
		array(
'name' => 'type_id',
'filter' => CHtml::listData(Kategoriya::model()->findAll(), 'id', 'name'),
'value' => '$data->KuponType->name',
),
		'finish_date',
		array(
'name' => 'categorry_id',
'filter' => CHtml::listData(Kategoriya::model()->findAll(), 'id', 'name'),
'value' => '$data->kategoriya->name',
),
		/*
		'date_create',
		'img_url',
		'name',
		'categorry_id',
		'title_tag',
		'description_tag',
		'keywords_tag',
		'show',
		'offer_id',
		'use_count',
		'partner_id',
		'type_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
