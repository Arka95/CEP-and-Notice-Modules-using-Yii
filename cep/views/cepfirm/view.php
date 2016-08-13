<?php
$this->breadcrumbs=array(
	'Cepfirms'=>array('index'),
	$model->CF_ID,
);

$this->menu=array(
array('label'=>'List CEPFIRM','url'=>array('index')),
array('label'=>'Create CEPFIRM','url'=>array('create')),
array('label'=>'Update CEPFIRM','url'=>array('update','id'=>$model->CF_ID)),
array('label'=>'Delete CEPFIRM','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->CF_ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CEPFIRM','url'=>array('admin')),
);
?>

<h1>View CEPFIRM #<?php echo $model->CF_ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'CF_ID',
		'CF_TYPE',
		'CF_NAME',
		'CF_ADDRESS',
		'CF_COUNTRY',
		'CF_STATE',
		'CF_CITY',
		'CF_PIN',
),
)); ?>
