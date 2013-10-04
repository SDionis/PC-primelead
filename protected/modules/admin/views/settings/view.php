<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Список Settings', 'url'=>array('index')),
	array('label'=>'Создать Settings', 'url'=>array('create')),
	array('label'=>'Обновить Settings', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Удалить Settings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Подтвердите удаление.')),
	array('label'=>'Управление Settings', 'url'=>array('admin')),
);
?>

<h1>View Settings #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'partner_id',
		'admin_login',
		'admin_user',
		'main_new_kupons',
		'main_popular_kupons',
	),
)); ?>
