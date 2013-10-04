<?php
/* @var $this KuponController */
/* @var $model Kupon */



$this->menu=array(
	array('label'=>'Журнал Промокодов', 'url'=>array('index')),
);
?>

<h1>Создать промокод</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>