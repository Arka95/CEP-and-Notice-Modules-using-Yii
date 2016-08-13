<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('CV_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CV_ID),array('view','id'=>$data->CV_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CV_CI_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CV_CI_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CV_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->CV_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CV_GENDER')); ?>:</b>
	<?php echo CHtml::encode($data->CV_GENDER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CV_OCCUPATION')); ?>:</b>
	<?php echo CHtml::encode($data->CV_OCCUPATION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CV_PHOTO')); ?>:</b>
	<?php echo CHtml::encode($data->CV_PHOTO); ?>
	<br />


</div>