<?php
/* @var $this NoticemanagerController */
/* @var $model NOTICENOTICE */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
<?php echo $form->label($model, 'NT_ID'); ?>
<?php echo $form->textField($model, 'NT_ID'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NT_TITLE'); ?>
<?php echo $form->textField($model, 'NT_TITLE', array('size' => 60, 'maxlength' => 200)); ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'NT_EXP_DATE');
        $this->widget('bootstrap.widgets.TbDateTimePicker', array(
            'model' => $model,
            'attribute' => 'NT_EXP_DATE',
            'value' => $model->NT_EXP_DATE,
            //additional javascript options for the date picker plugin
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'showAnim' => 'fold',
                'debug' => true,
                'datepickerOptions' => array('changeMonth' => true, 'changeYear' => true),
            ),
            'htmlOptions' => array('style' => 'height:20px;'),
        ));

        echo $form->error($model, 'deadline');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'NT_PUB_DATE');
        $this->widget('bootstrap.widgets.TbDateTimePicker', array(
            'model' => $model,
            'attribute' => 'NT_PUB_DATE',
            'value' => $model->NT_PUB_DATE,
            //additional javascript options for the date picker plugin
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'showAnim' => 'fold',
                'debug' => true,
                'datepickerOptions' => array('changeMonth' => true, 'changeYear' => true),
            ),
            'htmlOptions' => array('style' => 'height:20px;'),
        ));

        echo $form->error($model, 'NT_PUB_DATE');
        ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NT_REF_NUMBER'); ?>
        <?php echo $form->textField($model, 'NT_REF_NUMBER', array('size' => 60, 'maxlength' => 200)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NT_FILE_TYPE'); ?>
<?php echo $form->textField($model, 'NT_FILE_TYPE', array('size' => 20, 'maxlength' => 20)); ?>
    </div>


    <div class="row">
<?php echo $form->label($model, 'NT_UPLOADEDE_BY'); ?>
        <?php echo $form->textField($model, 'NT_UPLOADEDE_BY'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NT_CREATED_ON'); ?>
        <?php echo $form->textField($model, 'NT_CREATED_ON'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NT_STATUS_ID'); ?>
        <?php echo $form->textField($model, 'NT_STATUS_ID'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NT_SUBJECT'); ?>
        <?php echo $form->textField($model, 'NT_SUBJECT', array('size' => 60, 'maxlength' => 4000)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NT_UPDATED_ON'); ?>
        <?php echo $form->textField($model, 'NT_UPDATED_ON'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->