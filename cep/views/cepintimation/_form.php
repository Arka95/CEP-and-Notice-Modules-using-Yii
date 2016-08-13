<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cepintimation-form',
    'enableAjaxValidation' => false,
        ));
?>
<?php
Yii::app()->clientScript->registerScript('show_other', "
    if($('#CEPINTIMATION_CF_COUNTRY').val()!='India')
    {
        $('#country_other').show();
        $('#CEPINTIMATION_CF_STATE').hide();
    }else{
        $('#country_other').hide();
         $('#CEPINTIMATION_CF_STATE').show();
    }
    
                                                
    $('#CEPINTIMATION_CF_COUNTRY').change(function(){

        if($('#CEPINTIMATION_CF_COUNTRY option:selected').val()!='India')
        {
            $('#country_other').show();
             $('#CEPINTIMATION_CF_STATE').hide();
        }
        if($('#CEPINTIMATION_CF_COUNTRY option:selected').val()=='India')
        {
            $('#country_other').hide();
            $('#CEPINTIMATION_CF_STATE').show();
        }
    })
    
 if($('#CEPINTIMATION_CF_NAME_SEARCH').val()=='other')
    {
        $('#firm_details').show();
        
    }else{
        $('#firm_details').hide();
         $('#CEPINTIMATION_CF_STATE').show();
    }
    
                                                
    $('#CEPINTIMATION_CF_NAME_SEARCH').change(function(){

        if($('#CEPINTIMATION_CF_NAME_SEARCH option:selected').val()=='other')
        {
            $('#firm_details').show();
            
        }
        if($('#CEPINTIMATION_CF_NAME_SEARCH option:selected').val()!='other')
        {
            $('#firm_details').hide();
            $('#CEPINTIMATION_CF_NAME_SEARCH').show();
        }
    })
    if($('#CEPINTIMATION_CI_PURPOSE').val()=='Other'){
        $('#purpose_other').show();
        
    }else{
        $('#purpose_other').hide();
         
        
    }
						
                                                
    $('#CEPINTIMATION_CI_PURPOSE').change(function(){

            if($('#CEPINTIMATION_CI_PURPOSE option:selected').val()=='Other')
            {
                    $('#purpose_other').show();
                    
            }
            if($('#CEPINTIMATION_CI_PURPOSE option:selected').val()!='Other')
            {
                    $('#purpose_other').hide();
                    
            }
    })
    
 
						
                                                
 ", CClientScript::POS_READY);
?>


<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php /*
  <?php echo $form->textFieldRow($model,'CI_CF_ID',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'CI_INTIMATED_BY',array('class'=>'span5')); ?>
 */ ?>
<table  class="visitor" style="width: 100%;">
    <tbody>
        <tr >
            <td colspan="2">
                <?php echo $form->dropdownListRow($model, 'CI_AUTH_BY', EUSER::model()->getUser()); ?>
            
            </td>
        </tr>    
        <tr>
            
            <td>
                <?php echo $form->dropdownListRow($model, 'CI_PURPOSE', $model->getPurpose()); ?> </td>
            <td>
             <div id='purpose_other'> <?php echo $form->textFieldRow($model, 'CI_PURPOSE_OTHER'); ?></div>
            </td>
        </tr>
            
            <?php /*
              <?php echo $form->textFieldRow($model,'CI_VST_ENTRY_DATE',array('class'=>'span5')); ?>

              <?php echo $form->textFieldRow($model,'CI_VST_EXIT_DATE',array('class'=>'span5')); ?>
             */ ?>
            
            <?php /*
              <?php echo $form->textFieldRow($model,'CI_UPDATED_ON',array('class'=>'span5')); ?>

              <?php echo $form->textFieldRow($model,'CI_CREATED_ON',array('class'=>'span5')); ?>

              <?php echo $form->textFieldRow($model,'CI_STATUS',array('class'=>'span5','maxlength'=>20)); ?>
             */ ?>
        <tr>
            <td><?php
                echo $form->dateTimePickerRow($model, 'CI_VST_EXPECTED_ENTRY_DATE', array('options' => array('format' => 'dd-mm-yyyy H:i:s', 'endDate' => '+1y', 'viewMode' => 'years',
                        'language' => 'en', 'autoclose' => true)), array(
                    'options' => array('language' => 'en'),
                    'prepend' => '<i class="icon-calendar"></i>',
                    'readonly' => true
                        )
                );
                ?>
            </td>
            <td><?php
                echo $form->dateTimePickerRow($model, 'CI_VST_EXPECTED_EXIT_DATE', array('options' => array('format' => 'dd-mm-yyyy H:i:s', 'endDate' => '+1y', 'viewMode' => 'years',
                        'language' => 'en', 'autoclose' => true)), array(
                    'options' => array('language' => 'en'),
                    'prepend' => '<i class="icon-calendar"></i>',
                    'readonly' => true
                        )
                );
                ?>
            </td>

        </tr>
<tr>
    <td colspan="2">
        <?php echo $form->dropdownListRow($model, 'CF_NAME_SEARCH', CEPFIRM::model()->getFirmList()); ?>
    </td>
</tr>
<tr><td colspan="2"><div  id="firm_details">
        <table>
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->dropdownListRow($model, 'CF_TYPE', CEPFIRM::model()->getFirmType()); ?>
                    </td>
                    <td></td>
                        
                </tr>

                <tr>
                    <td><?php echo $form->textFieldRow($model, 'CF_NAME', array( 'maxlength' => 200)); ?></td>

                    <td><?php echo $form->textFieldRow($model, 'CF_ADDRESS', array( 'maxlength' => 300)); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->dropdownListRow($model, 'CF_COUNTRY', CEPFIRM::model()->getCountry()); ?></td>

                    <td><?php echo $form->dropdownListRow($model, 'CF_STATE', CEPFIRM::model()->getState(), array( 'maxlength' => 100)); ?>
                    <div id='country_other'>    <?php echo $form->textFieldRow($model, 'CF_STATE_OTHER'); ?></div></td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->textFieldRow($model, 'CF_CITY', array( 'maxlength' => 100)); ?>
                    </td>
                    <td>
                        <?php echo $form->textFieldRow($model, 'CF_PIN'); ?>
                    </td>
                </tr>
            


            </tbody>
        </table>
                </div>
                </td>
                </tr>
    
    <?php /*
      <?php echo $form->textFieldRow($model,'CI_KEY',array('class'=>'span5','maxlength'=>1024)); ?>
     */ ?>

</tbody>
</table>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
