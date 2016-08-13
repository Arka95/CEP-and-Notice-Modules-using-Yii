<?php
$this->breadcrumbs=array(
	'Cepofficers'=>array('index'),
	$model->CO_ID,
);

$this->menu=array(
array('label'=>'List CEPOFFICERS','url'=>array('index')),
array('label'=>'Create CEPOFFICERS','url'=>array('create')),
array('label'=>'Update CEPOFFICERS','url'=>array('update','id'=>$model->CO_ID)),
array('label'=>'Delete CEPOFFICERS','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->CO_ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CEPOFFICERS','url'=>array('admin')),
);
?>

<h1>View CEPOFFICERS #<?php echo $model->CO_ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'CO_ID',
		'CO_CI_ID',
		'CO_PERID',
),
)); ?>
