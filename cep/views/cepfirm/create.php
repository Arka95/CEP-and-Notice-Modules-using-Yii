<?php
$this->breadcrumbs=array(
	'Cepfirms'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CEPFIRM','url'=>array('index')),
array('label'=>'Manage CEPFIRM','url'=>array('admin')),
);
?>

<h1>Create CEPFIRM</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>