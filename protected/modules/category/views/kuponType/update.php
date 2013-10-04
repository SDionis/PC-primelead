<?php
/* @var $this KuponTypeController */
/* @var $model KuponType */

$this->breadcrumbs=array(
	'Kupon Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KuponType', 'url'=>array('index')),
	array('label'=>'Create KuponType', 'url'=>array('create')),
	array('label'=>'View KuponType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KuponType', 'url'=>array('admin')),
);
?>

<h1>Update KuponType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>