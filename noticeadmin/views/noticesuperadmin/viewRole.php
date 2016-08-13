<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'View Role',
//        'headerIcon' => 'icon-user',
        
    ));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(		
            'NT_RL_DESCRIPTION',
            'nTRLCREATEDBY.NT_SUP_NAME' ,
            'NT_RL_CREATED_ON',			
					
	),
)); ?>
<?php $this->endWidget();?>