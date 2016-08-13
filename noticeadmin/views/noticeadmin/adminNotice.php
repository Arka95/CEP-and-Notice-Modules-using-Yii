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





<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'noticenotice-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'NT_TITLE',
//                array(
//                    'name'=>'NT_PUB_DATE',
//                    'value'=>'$data->NT_PUB_DATE',
//                    'filter'=> CHtml::dateField('NT_PUB_DATE', 'NT_PUB_DATE', array()),// CHtml::dateField('NT_PUB_DATE'),// CHtml::listData(EUSER::model()->findAll(array('select'=>'AP_CCTYPE','distinct'=>true,'order'=>'AP_CCTYPE ASC')), 'AP_CCTYPE', 'AP_CCTYPE'),
//                   // 'htmlOptions'=>array('class'=>'span2'),
//                ),
            'NT_CREATED_ON',
                'NT_PUB_DATE',
		'NT_EXP_DATE',
		'NT_SUBJECT',
		'NT_REF_NUMBER',
		'nTSTATUS.NT_STS_DESCRIPTION',
		      array
            (
            'header' => 'Edit  ',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}',
            //'visible'=>'$data->app_form_id!=21',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => 'Edit',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
                    'url' => 'Yii::app()->createUrl("noticeadmin/noticeadmin/updateNotice", array("id"=>$data->NT_ID))',
                ),
            ),
        ),
        array
            (
            'header' => 'Delete ',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
            //'visible'=>'$data->app_form_id!=21',
            'buttons' => array
                (
                'delete' => array
                    (
                    'label' => 'Delete',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
                    'url' => 'Yii::app()->createUrl("noticeadmin/noticeadmin/deleteNotice", array("id"=>$data->NT_ID))',
                ),
            ),
        ),
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
            		'url'=>'Yii::app()->createUrl("noticeadmin/noticeadmin/displayNotice", array("id"=>$data->NT_ID))',
        		),
                    ),
                )
	),
)); ?>
