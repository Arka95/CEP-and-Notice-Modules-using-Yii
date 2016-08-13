<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cepvisitor-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CV_CI_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CV_NAME',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'CV_GENDER',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'CV_OCCUPATION',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'CV_PHOTO',array('class'=>'span5','maxlength'=>4000)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
