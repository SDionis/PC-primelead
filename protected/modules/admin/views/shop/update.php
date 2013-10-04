<?php
/* @var $this ShopController */
/* @var $model Shop */



$this->menu=array(
	array('label'=>'Журнал Магазинов', 'url'=>array('index')),
	array('label'=>'Создать Магазин', 'url'=>array('create')),
	array('label'=>'Просмотр Магазина', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Обновить Магазин <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>