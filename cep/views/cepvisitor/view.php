<?php
$this->breadcrumbs=array(
	'Cepvisitors'=>array('index'),
	$model->CV_ID,
);

$this->menu=array(
array('label'=>'List CEPVISITOR','url'=>array('index')),
array('label'=>'Create CEPVISITOR','url'=>array('create')),
array('label'=>'Update CEPVISITOR','url'=>array('update','id'=>$model->CV_ID)),
array('label'=>'Delete CEPVISITOR','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->CV_ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CEPVISITOR','url'=>array('admin')),
);
?>

<h1>View CEPVISITOR #<?php echo $model->CV_ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'CV_ID',
		'CV_CI_ID',
		'CV_NAME',
		'CV_GENDER',
		'CV_OCCUPATION',
		'CV_PHOTO',
),
)); ?>
