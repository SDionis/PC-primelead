<?php
/* @var $this KuponTypeController */
/* @var $model KuponType */

$this->breadcrumbs=array(
	'Kupon Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List KuponType', 'url'=>array('index')),
	array('label'=>'Create KuponType', 'url'=>array('create')),
	array('label'=>'Update KuponType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KuponType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KuponType', 'url'=>array('admin')),
);
?>

<h1>View KuponType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
