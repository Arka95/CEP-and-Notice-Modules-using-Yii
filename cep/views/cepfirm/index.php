<?php
$this->breadcrumbs=array(
	'Cepfirms',
);

$this->menu=array(
array('label'=>'Create CEPFIRM','url'=>array('create')),
array('label'=>'Manage CEPFIRM','url'=>array('admin')),
);
?>

<h1>Cepfirms</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
