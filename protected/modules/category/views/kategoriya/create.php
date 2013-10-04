<?php
/* @var $this KategoriyaController */
/* @var $model Kategoriya */

$this->breadcrumbs=array(
	'Kategoriyas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kategoriya', 'url'=>array('index')),
	array('label'=>'Manage Kategoriya', 'url'=>array('admin')),
);
?>

<h1>Create Kategoriya</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>