<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>Журнал Settings', 'url'=>array('index')),
	array('label'=>'Создать Settings', 'url'=>array('create')),
	array('label'=>'View Settings', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Управление Settings', 'url'=>array('admin')),
);
?>

<h1>Обновить Settings <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>