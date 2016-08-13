<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'View Sections',
//        'headerIcon' => 'icon-user',
        
    ));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
            'NT_SEC_ID',
            'NT_SEC_NAME',
            'nTSECCREATEDBY.NT_SUP_NAME' ,
            'NT_SEC_CREATED_ON',
            'NT_SEC_UPDATED_ON',
					
	),
)); ?>
<?php $this->endWidget();?>