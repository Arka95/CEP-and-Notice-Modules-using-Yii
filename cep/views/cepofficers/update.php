<?php
$this->breadcrumbs=array(
	'Cepofficers'=>array('index'),
	$model->CO_ID=>array('view','id'=>$model->CO_ID),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CEPOFFICERS','url'=>array('index')),
	array('label'=>'Create CEPOFFICERS','url'=>array('create')),
	array('label'=>'View CEPOFFICERS','url'=>array('view','id'=>$model->CO_ID)),
	array('label'=>'Manage CEPOFFICERS','url'=>array('admin')),
	);
	?>

	<h1>Update CEPOFFICERS <?php echo $model->CO_ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>