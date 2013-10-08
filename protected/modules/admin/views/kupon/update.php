<?php
/* @var $this KuponController */
/* @var $model Kupon */



$this->menu=array(
	array('label'=>'Журнал Промокодов', 'url'=>array('index')),
	array('label'=>'Создать Промокод', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Обновить Kupon <?php echo $model->id; ?></h1>

<?php 
$categorry=$model->categorry_id;
$data = Kategoriya::model()
        ->find(array('condition' =>
        "id = $categorry"
        ));
		if ($data->parent_id > 0)
{$this->renderPartial('_form1', array('model'=>$model));}
else
{$this->renderPartial('_form', array('model'=>$model));} ?>