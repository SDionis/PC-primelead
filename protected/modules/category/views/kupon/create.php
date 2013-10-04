<?php
/* @var $this KuponController */
/* @var $model Kupon */

$this->breadcrumbs=array(
	'Kupons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kupon', 'url'=>array('index')),
	array('label'=>'Manage Kupon', 'url'=>array('admin')),
);
?>

<h1>Create Kupon</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>