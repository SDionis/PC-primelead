<?php
/* @var $this KuponTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kupon Types',
);

$this->menu=array(
	array('label'=>'Create KuponType', 'url'=>array('create')),
	array('label'=>'Manage KuponType', 'url'=>array('admin')),
);
?>

<h1>Kupon Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
