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
		'CO_PERID',
                'CO_NAME',
                'CO_DESIGNATION',
                'CO_EXTN',
                
		
		

		
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
            		'url'=>'Yii::app()->createUrl("cep/cepintimation/officersToMeet", array("type"=>$data->CO_ID))',
        		),
        		'delete' => array
        		(
            		'label'=>'Delete',
        		
            		//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ajax-loading/print.png',
            		'url'=>'Yii::app()->createUrl("cep/cepintimation/delete", array("id"=>$data->CO_ID,"modelName"=>"CEPOFFICERS"))',
        		),
        		
        		
    		),
		),
		
		
	),
)); ?>
<?php if ($model!=null):?>


<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => $model->isNewRecord ? 'Add Officer' : 'Edit Officer',
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

	
         <?php echo $form->dropdownListRow($model, 'CO_PERID', EUSER::model()->getUser(), array('class' => 'span5')); ?>
        
      

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
        'label'=>'Add Officers to meet',
        'url'=>Yii::app()->createUrl('cep/cepintimation/officersToMeet', array('type' => 'new')),
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
<?php endif;?>
        
        
 