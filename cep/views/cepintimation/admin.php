<?php
$this->breadcrumbs=array(
	'Cepintimations'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CEPINTIMATION','url'=>array('index')),
array('label'=>'Create CEPINTIMATION','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cepintimation-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Cepintimations</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'cepintimation-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'CI_ID',
		'CI_CF_ID',
		'CI_INTIMATED_BY',
		'CI_AUTH_BY',
		'CI_INTIMATION_DATE',
		'CI_VST_ENTRY_DATE',
		/*
		'CI_VST_EXIT_DATE',
		'CI_PURPOSE',
		'CI_UPDATED_ON',
		'CI_CREATED_ON',
		'CI_STATUS',
		'CI_VST_EXPECTED_ENTRY_DATE',
		'CI_VST_EXPECTED_EXIT_DATE',
		'CI_KEY',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
