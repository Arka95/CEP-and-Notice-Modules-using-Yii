<?php
$this->breadcrumbs=array(
	'Cepofficers',
);

$this->menu=array(
array('label'=>'Create CEPOFFICERS','url'=>array('create')),
array('label'=>'Manage CEPOFFICERS','url'=>array('admin')),
);
?>

<h1>Cepofficers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
