<?php
/* @var $this SettingsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Settings',
);

$this->menu=array(
	array('label'=>'Создать Settings', 'url'=>array('create')),
	array('label'=>'Управление Settings', 'url'=>array('admin')),
);
?>

<h1>Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
