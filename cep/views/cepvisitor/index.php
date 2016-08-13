<?php
$this->breadcrumbs=array(
	'Cepvisitors',
);

$this->menu=array(
array('label'=>'Create CEPVISITOR','url'=>array('create')),
array('label'=>'Manage CEPVISITOR','url'=>array('admin')),
);
?>

<h1>Cepvisitors</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
