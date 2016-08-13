<?php

$this->menu=array(
array('label'=>'List CEPINTIMATION','url'=>array('index')),
array('label'=>'Create CEPINTIMATION','url'=>array('create')),
array('label'=>'Update CEPINTIMATION','url'=>array('update','id'=>$model->CI_ID)),
array('label'=>'Delete CEPINTIMATION','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->CI_ID),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CEPINTIMATION','url'=>array('admin')),
);
?>

<h1>View CEPINTIMATION #<?php echo $model->CI_ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'CI_ID',
		'CI_CF_ID',
		'CI_INTIMATED_BY',
		'CI_AUTH_BY',
		'CI_INTIMATION_DATE',
		'CI_VST_ENTRY_DATE',
		'CI_VST_EXIT_DATE',
		'CI_PURPOSE',
		'CI_UPDATED_ON',
		'CI_CREATED_ON',
		'CI_STATUS',
		'CI_VST_EXPECTED_ENTRY_DATE',
		'CI_VST_EXPECTED_EXIT_DATE',
		'CI_KEY',
),
)); ?>
