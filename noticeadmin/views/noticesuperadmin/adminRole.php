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
                    'NT_RL_DESCRIPTION',
                    'nTRLCREATEDBY.NT_SUP_NAME',
                    'NT_RL_CREATED_ON',
                    'NT_RL_UPDATED_ON',
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
            		'url'=>'Yii::app()->createUrl("noticeadmin/noticesuperadmin/viewRole", array("id"=>$data->NT_RL_ID))',
        		),
        		        
    		)),
		
                    
                    
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
            		'url'=>'Yii::app()->createUrl("noticeadmin/noticesuperadmin/updateRole", array("id"=>$data->NT_RL_ID))',
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
            		'url'=>'Yii::app()->createUrl("noticeadmin/noticesuperadmin/deleteRole", array("id"=>$data->NT_RL_ID))',
        		),
        		
        		
    		),
		),
		
	),
)); ?>