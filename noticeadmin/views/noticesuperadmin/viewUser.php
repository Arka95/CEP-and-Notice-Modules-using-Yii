<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'View User',
//        'headerIcon' => 'icon-user',
        
    ));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(		
            'NT_USR_NAME',
            'NT_USR_EMAIL',
            //'NT_USR_PERID',
            'nTUSRSECTION.NT_SEC_NAME',      
            'nTUSRROLE.NT_RL_DESCRIPTION',
            'nTUSRCREATEDBY.NT_SUP_NAME' ,
            'NT_USR_CREATED_ON',			
					
	),
)); ?>
<?php $this->endWidget();?>