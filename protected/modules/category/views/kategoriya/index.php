<?php
/* @var $this KategoriyaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kategoriyas',
);

$this->menu=array(
	array('label'=>'Create Kategoriya', 'url'=>array('create')),
	array('label'=>'Manage Kategoriya', 'url'=>array('admin')),
);
?>

<h1>Kategoriyas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
