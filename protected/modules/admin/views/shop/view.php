<?php
/* @var $this ShopController */
/* @var $model Shop */



$this->menu=array(
	array('label'=>'Журнал Магазинов', 'url'=>array('index')),
	array('label'=>'Создать Магазин', 'url'=>array('create')),
	array('label'=>'Обновить Магазин', 'url'=>array('update', 'id'=>$model->id)),


);
?>

<h1>View Shop #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'image',
		'translit_url',
		'title_tag',
		'keywords_tag',
		'description_tag',
		'show',
	),
)); ?>
