<?php
/* @var $this KuponController */
/* @var $model Kupon */

$this->breadcrumbs=array(
	'Kupons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список Kupon', 'url'=>array('index')),
	array('label'=>'Создать Kupon', 'url'=>array('create')),
	array('label'=>'Обновить Kupon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Kupon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтвердите удаление.')),
);
?>


<h1>View Kupon #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
'label'=>'Shop',
'type'=>'raw',
'value'=>$model->shop->name,
),
		'description',
		'translit_url',
		'promokod',
		'finish_date',
		'date_create',
		'img_url',
		'name',
		array(
'label'=>'Category',
'type'=>'raw',
'value'=>$model->kategoriya->name,
),
		'title_tag',
		'description_tag',
		'keywords_tag',
		'show',
		'offer_id',
		'use_count',
	
	),
)); ?>
