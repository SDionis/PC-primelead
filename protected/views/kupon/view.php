<?php
/* @var $this KuponController */
/* @var $model Kupon */
$this->pageTitle = $model->title_tag;
//$this->Keywords = $model->title_tag;
$this->pageDescription = $model->description_tag;
$this->pageKeywords=$model->keywords_tag;
$this->breadcrumbs=array(
	'Kupons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kupon', 'url'=>array('index')),
	array('label'=>'Create Kupon', 'url'=>array('create')),
	array('label'=>'Update Kupon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kupon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kupon', 'url'=>array('admin')),
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
				array(
'label'=>'type',
'type'=>'raw',
'value'=>$model->KuponType->name,
),
	),
)); ?>


