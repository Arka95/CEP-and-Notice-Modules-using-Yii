<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'View Notice',
//        'headerIcon' => 'icon-user',
        
    ));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(		
            'NT_ID',
'NT_TITLE',
'NT_PUB_DATE',
'NT_EXP_DATE',
'NT_REF_NUMBER',
'NT_FILE_TYPE',
'NT_FILE_SIZE',
'NT_FILE_NAME',

'nTUPLOADEDEBY.NT_SEC_NAME',
'NT_CREATED_ON',
'nTSTATUS.NT_STS_DESCRIPTION',
'NT_SUBJECT',
'NT_UPDATED_ON',
	),
)); ?>
<?php $this->endWidget();?>
<?php echo CHtml::link('Download',array('displayNotice','id'=>$model->NT_ID)); ?>