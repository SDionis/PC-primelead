<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал магазинов', 'url'=>array('index'))
);
?>

<h1>Создать магазин</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>