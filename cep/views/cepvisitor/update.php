<?php
$this->breadcrumbs=array(
	'Cepvisitors'=>array('index'),
	$model->CV_ID=>array('view','id'=>$model->CV_ID),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CEPVISITOR','url'=>array('index')),
	array('label'=>'Create CEPVISITOR','url'=>array('create')),
	array('label'=>'View CEPVISITOR','url'=>array('view','id'=>$model->CV_ID)),
	array('label'=>'Manage CEPVISITOR','url'=>array('admin')),
	);
	?>

	<h1>Update CEPVISITOR <?php echo $model->CV_ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>