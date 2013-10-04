<?php
/* @var $this KategoriyaController */
/* @var $data Kategoriya */
?>

<div class="view">

	

	<b><?php 
	$this->menu=array(
	array('label'=>'Create Kategoriya', 'url'=>array('create')),
	array('label'=>'Manage Kategoriya', 'url'=>array('admin')),
);
	
	$this->widget('zii.widgets.CMenu', array( 'items'=>Kategoriya::All_shown(), 'htmlOptions'=>array('class'=>'operations' ), )); 
	?>
</div>
