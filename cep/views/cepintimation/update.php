<?php

	$this->menu=array(
	array('label'=>'List CEPINTIMATION','url'=>array('index')),
	array('label'=>'Create CEPINTIMATION','url'=>array('create')),
	array('label'=>'View CEPINTIMATION','url'=>array('view','id'=>$model->CI_ID)),
	array('label'=>'Manage CEPINTIMATION','url'=>array('admin')),
	);
	?>

	<h1>Update CEPINTIMATION <?php echo $model->CI_ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>