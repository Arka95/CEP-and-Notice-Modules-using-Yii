<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cepfirm-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CF_TYPE',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'CF_NAME',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'CF_ADDRESS',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'CF_COUNTRY',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'CF_STATE',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'CF_CITY',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'CF_PIN',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
