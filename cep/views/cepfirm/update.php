<?php
$this->breadcrumbs=array(
	'Cepfirms'=>array('index'),
	$model->CF_ID=>array('view','id'=>$model->CF_ID),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CEPFIRM','url'=>array('index')),
	array('label'=>'Create CEPFIRM','url'=>array('create')),
	array('label'=>'View CEPFIRM','url'=>array('view','id'=>$model->CF_ID)),
	array('label'=>'Manage CEPFIRM','url'=>array('admin')),
	);
	?>

	<h1>Update CEPFIRM <?php echo $model->CF_ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>