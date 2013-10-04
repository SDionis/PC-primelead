<?php
/* @var $this KuponController */
/* @var $model Kupon */

$this->breadcrumbs=array(
	'Kupons'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kupon', 'url'=>array('index')),
	array('label'=>'Create Kupon', 'url'=>array('create')),
	array('label'=>'View Kupon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kupon', 'url'=>array('admin')),
);
?>

<h1>Update Kupon <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>