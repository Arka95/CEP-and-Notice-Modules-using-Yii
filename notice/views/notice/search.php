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
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->searchField($model, 'NT_TITLE', array('class' => 'span5', 'maxlength' => 100)); ?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
       // 'label' => $model->isNewRecord ? 'Save' : 'Update',
    ));
    ?>
</div>


<?php $this->endWidget(); ?>