<?php
/* @var $this KuponController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Промокоды',
);

$this->menu=array(
	array('label'=>'Create Kupon', 'url'=>array('create')),
	array('label'=>'Manage Kupon', 'url'=>array('admin')),
);
?>

	<div class="span9">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view'
	//'sortableAttributes' => array('finish_date'), 
)); ?>
	</div><!--end span9-->