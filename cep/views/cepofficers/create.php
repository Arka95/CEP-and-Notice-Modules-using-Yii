<?php
$this->breadcrumbs=array(
	'Cepofficers'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CEPOFFICERS','url'=>array('index')),
array('label'=>'Manage CEPOFFICERS','url'=>array('admin')),
);
?>

<h1>Create CEPOFFICERS</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>