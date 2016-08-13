<?php 
	$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'disabilityQuota-grid',
	'dataProvider'=>$modelDisplay,
	//'filter'=>$modelDisplay,
	'type'=>'striped bordered condensed',
			
			
			'showTableOnEmpty'=>false,
			'emptyText'=>'',
			'summaryText'=>'',
	
	'columns'=>array(
		//'ed_app_form_id',
		//'ed_id',
		'CV_NAME',
                'CV_GENDER',
                'CV_OCCUPATION',
		
		

		
		array
		(
			'header'=>'Edit / Delete ',
    		'class'=>'bootstrap.widgets.TbButtonColumn',
    		'template'=>'{update}{delete}',
			//'visible'=>'$data->app_form_id!=21',
    		'buttons'=>array
    		(
    		
        		'update' => array
        		(
            		'label'=>'Edit',
        		
            		//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
            		'url'=>'Yii::app()->createUrl("cep/cepintimation/visitor", array("type"=>$data->CV_ID))',
        		),
        		'delete' => array
        		(
            		'label'=>'Delete',
        		
            		//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
            		'url'=>'Yii::app()->createUrl("cep/cepintimation/delete", array("id"=>$data->CV_ID,"modelName"=>"CEPVISITOR"))',
        		),
        		
        		
    		),
		),
		
		
	),
)); ?>
<?php if ($model!=null):?>


<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => $model->isNewRecord ? 'Add Visitor' : 'Edit Visitor',
        'headerIcon' => 'icon-edit',
        
    ));?> 



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'disability-quota-form',
		'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CV_NAME',array('class'=>'span5','maxlength'=>50)); ?>
        
        <?php echo $form->dropDownListRow($model, 'CV_GENDER', $model->getGender()); ?>
        
        <?php echo $form->textFieldRow($model,'CV_OCCUPATION',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
<?php else :?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Add Visitor',
        'url'=>Yii::app()->createUrl('cep/cepintimation/visitor', array('type' => 'new')),
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
<?php endif;?>
        
        
 