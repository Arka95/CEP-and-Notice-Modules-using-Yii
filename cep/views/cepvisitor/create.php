<?php
$this->breadcrumbs=array(
	'Cepvisitors'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CEPVISITOR','url'=>array('index')),
array('label'=>'Manage CEPVISITOR','url'=>array('admin')),
);
?>

<h1>Create CEPVISITOR</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>