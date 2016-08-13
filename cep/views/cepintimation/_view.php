<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('CI_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CI_ID),array('view','id'=>$data->CI_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_CF_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CI_CF_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_INTIMATED_BY')); ?>:</b>
	<?php echo CHtml::encode($data->CI_INTIMATED_BY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_AUTH_BY')); ?>:</b>
	<?php echo CHtml::encode($data->CI_AUTH_BY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_INTIMATION_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->CI_INTIMATION_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_VST_ENTRY_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->CI_VST_ENTRY_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_VST_EXIT_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->CI_VST_EXIT_DATE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_PURPOSE')); ?>:</b>
	<?php echo CHtml::encode($data->CI_PURPOSE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_UPDATED_ON')); ?>:</b>
	<?php echo CHtml::encode($data->CI_UPDATED_ON); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_CREATED_ON')); ?>:</b>
	<?php echo CHtml::encode($data->CI_CREATED_ON); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->CI_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_VST_EXPECTED_ENTRY_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->CI_VST_EXPECTED_ENTRY_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_VST_EXPECTED_EXIT_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->CI_VST_EXPECTED_EXIT_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CI_KEY')); ?>:</b>
	<?php echo CHtml::encode($data->CI_KEY); ?>
	<br />

	*/ ?>

</div>