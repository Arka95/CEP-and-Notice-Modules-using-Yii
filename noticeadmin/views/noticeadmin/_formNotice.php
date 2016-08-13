<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'disability-quota-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->fileFieldRow($model, 'uploadedFile'); ?>

<?php echo $form->textFieldRow($model, 'NT_TITLE', array('class' => 'span5', 'maxlength' => 40)); ?>
<?php echo $form->textFieldRow($model, 'NT_REF_NUMBER', array('class' => 'span5', 'maxlength' => 40)); ?>
<?php echo $form->textFieldRow($model, 'NT_SUBJECT', array('class' => 'span5', 'maxlength' => 4000)); ?>
<?php
               echo $form->dateTimePickerRow($model,'NT_PUB_DATE',array('options'=>array('format' => 'dd-mm-yyyy H:i:s','endDate'=>'+1y','viewMode'=>'years',
	'language' => 'en','autoclose'=> true)),
	array(
                'options' => array('language' => 'en'),
                'prepend' => '<i class="icon-calendar"></i>',
                'readonly'=>true
            )
        ); ?>
<?php
               echo $form->dateTimePickerRow($model,'NT_EXP_DATE',array('options'=>array('format' => 'dd-mm-yyyy H:i:s','endDate'=>'+1y','viewMode'=>'years',
	'language' => 'en','autoclose'=> true)),
	array(
                'options' => array('language' => 'en'),
                'prepend' => '<i class="icon-calendar"></i>',
                'readonly'=>true
            )
        ); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Save' : 'Update',
    ));
    ?>
</div>
<?php $this->endWidget(); ?>


