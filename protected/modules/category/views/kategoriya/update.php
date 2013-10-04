<?php
/* @var $this KategoriyaController */
/* @var $model Kategoriya */

$this->breadcrumbs=array(
	'Kategoriyas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kategoriya', 'url'=>array('index')),
	array('label'=>'Create Kategoriya', 'url'=>array('create')),
	array('label'=>'View Kategoriya', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kategoriya', 'url'=>array('admin')),
);
?>

<h1>Update Kategoriya <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>