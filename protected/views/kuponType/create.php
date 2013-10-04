<?php
/* @var $this KuponTypeController */
/* @var $model KuponType */

$this->breadcrumbs=array(
	'Kupon Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KuponType', 'url'=>array('index')),
	array('label'=>'Manage KuponType', 'url'=>array('admin')),
);
?>

<h1>Create KuponType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>