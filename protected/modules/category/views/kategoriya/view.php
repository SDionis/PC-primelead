<?php
/* @var $this KategoriyaController */
/* @var $model Kategoriya */

$this->breadcrumbs=array(
	'Kategoriyas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Kategoriya', 'url'=>array('index')),
	array('label'=>'Create Kategoriya', 'url'=>array('create')),
	array('label'=>'Update Kategoriya', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kategoriya', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kategoriya', 'url'=>array('admin')),
);
?>

<h1>View Kategoriya #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'image',
		'parent_id',
		'translit_url',
	),
)); ?>
