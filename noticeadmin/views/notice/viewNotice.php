<?php
/* @var $this NoticemanagerController */
/* @var $model NOTICENOTICE */
/*zii.widgets.grid.CGridView*/
$this->breadcrumbs=array(
	'Noticenotices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NOTICENOTICE', 'url'=>array('index')),
	array('label'=>'Create NOTICENOTICE', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#noticenotice-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Notices</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'noticenotice-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'NT_TITLE',
                array(
                    'name'=>'NT_PUB_DATE',
                    'value'=>'$data->NT_PUB_DATE',
                    'filter'=> CHtml::dateField('NT_PUB_DATE', 'NT_PUB_DATE', array()),// CHtml::dateField('NT_PUB_DATE'),// CHtml::listData(EUSER::model()->findAll(array('select'=>'AP_CCTYPE','distinct'=>true,'order'=>'AP_CCTYPE ASC')), 'AP_CCTYPE', 'AP_CCTYPE'),
                   // 'htmlOptions'=>array('class'=>'span2'),
                ),
		'NT_EXP_DATE',
		'NT_SUBJECT',
		'NT_REF_NUMBER',
            'NT_SUBJECT',
		'nTUPLOADEDEBY.NT_SEC_NAME',
		'nTSTATUS.NT_STS_DESCRIPTION',
		
		
		
		array
                (
                    'header' => 'Download',
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{download}',
                    //'visible'=>'$data->app_form_id!=21',
                    'buttons' => array
                        (
                        'download' => array
        		(
            		'label'=>'Download',
        		
            		//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
            		'url'=>'Yii::app()->createUrl("notice/notice/displayNotice", array("id"=>$data->NT_ID))',
        		),
                    ),
                )
	),
)); ?>
