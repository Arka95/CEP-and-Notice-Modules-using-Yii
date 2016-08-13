<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('CF_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CF_ID),array('view','id'=>$data->CF_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CF_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->CF_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CF_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->CF_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CF_ADDRESS')); ?>:</b>
	<?php echo CHtml::encode($data->CF_ADDRESS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CF_COUNTRY')); ?>:</b>
	<?php echo CHtml::encode($data->CF_COUNTRY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CF_STATE')); ?>:</b>
	<?php echo CHtml::encode($data->CF_STATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CF_CITY')); ?>:</b>
	<?php echo CHtml::encode($data->CF_CITY); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CF_PIN')); ?>:</b>
	<?php echo CHtml::encode($data->CF_PIN); ?>
	<br />

	*/ ?>

</div>