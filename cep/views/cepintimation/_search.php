<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'CI_ID',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_CF_ID',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_INTIMATED_BY',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_AUTH_BY',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_INTIMATION_DATE',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_VST_ENTRY_DATE',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_VST_EXIT_DATE',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_PURPOSE',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'CI_UPDATED_ON',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_CREATED_ON',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_STATUS',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'CI_VST_EXPECTED_ENTRY_DATE',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_VST_EXPECTED_EXIT_DATE',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CI_KEY',array('class'=>'span5','maxlength'=>1024)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
