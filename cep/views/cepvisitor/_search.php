<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'CV_ID',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CV_CI_ID',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CV_NAME',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'CV_GENDER',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'CV_OCCUPATION',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'CV_PHOTO',array('class'=>'span5','maxlength'=>4000)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
