<?php


$this->menu=array(
array('label'=>'Create CEPINTIMATION','url'=>array('create')),
array('label'=>'Manage CEPINTIMATION','url'=>array('admin')),
);
?>

<h1>CEP intimations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
