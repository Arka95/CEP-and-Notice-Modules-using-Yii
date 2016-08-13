<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'disabilityQuota-grid',
	'dataProvider'=>$modelDisplay,
	//'filter'=>$modelDisplay,
	'type'=>'striped bordered condensed',
			
			
			'showTableOnEmpty'=>false,
			'emptyText'=>'',
			'summaryText'=>'',
	
	'columns'=>array(
            'NT_SEC_ID',
                    'NT_SEC_NAME',
                   
                    'nTSECCREATEDBY.NT_SUP_NAME',
                    'NT_SEC_UPDATED_ON',
                   array
		(
			'header'=>'View  ',
    		'class'=>'bootstrap.widgets.TbButtonColumn',
    		'template'=>'{view}',
			//'visible'=>'$data->app_form_id!=21',
    		'buttons'=>array
    		(
    		
        		'view' => array
        		(
            		'label'=>'View',
        		
            		//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
            		'url'=>'Yii::app()->createUrl("noticeadmin/noticesuperadmin/viewSection", array("id"=>$data->NT_SEC_ID))',
        		),
        		        
    		),
		), 
                    
		array
		(
			'header'=>'Edit  ',
    		'class'=>'bootstrap.widgets.TbButtonColumn',
    		'template'=>'{update}',
			//'visible'=>'$data->app_form_id!=21',
    		'buttons'=>array
    		(
    		
        		'update' => array
        		(
            		'label'=>'Edit',
        		
            		//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
            		'url'=>'Yii::app()->createUrl("noticeadmin/noticesuperadmin/updateSection", array("id"=>$data->NT_SEC_ID))',
        		),
        		        
    		),
		),
		array
		(
			'header'=>'Delete ',
    		'class'=>'bootstrap.widgets.TbButtonColumn',
    		'template'=>'{delete}',
			//'visible'=>'$data->app_form_id!=21',
    		'buttons'=>array
    		(
        		'delete' => array
        		(
            		'label'=>'Delete',
        		
            		//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
            		'url'=>'Yii::app()->createUrl("noticeadmin/noticesuperadmin/deleteSection", array("id"=>$data->NT_SEC_ID))',
        		),
        		
        		
    		),
		),
		
	),
)); ?>