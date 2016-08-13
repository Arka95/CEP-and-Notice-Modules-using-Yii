<?php if(Yii::app()->user->hasFlash('success') or Yii::app()->user->hasFlash('error') or Yii::app()->user->hasFlash('warning')){
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => true,
            'fade' => true,
            'closeText' => '&times;', // false equals no close link
            'events' => array(),
            'htmlOptions' => array(),
            'userComponentId' => 'user',
            'alerts' => array( // configurations per alert type
                // success, info, warning, error or danger
                'success' => array('closeText' => false),
                'warning' => array('closeText' => false),

                'error' => array('block' => false, 'closeText' => false)
            ),
        ));
         CHtml::link('Create Another Intimation',Yii::app()->createUrl("cep/cepintimation"));
         } else{ ?>

<?php $this->renderPartial('_formIntimationDetails', array('modelIntimation'=>$modelIntimation,'modelVisitors'=>$modelVisitors,
                'modelOfficers'=>$modelOfficers,
                'modelFirm'=>$modelFirm)); ?>
         <?php }?>