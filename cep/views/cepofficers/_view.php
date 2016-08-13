<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('CO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CO_ID),array('view','id'=>$data->CO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CO_CI_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CO_CI_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CO_PERID')); ?>:</b>
	<?php echo CHtml::encode($data->CO_PERID); ?>
	<br />


</div>