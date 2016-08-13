<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NoticeController extends Controller
{
//    $layoutPath = Yii::getPathOfAlias('application.modules.admin.views.layouts');
//    $this->layout = 'adminLayout';
//    public $layout = "Yii::app()->basePath/modules/notice/views/layouts/noticeUserLayout" ;
      public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'index',
                ),
                'users' => array('@'),
            //'expression'=>"Yii::app()->session['userType'] = 'GroupHead'",
            ),
            array('allow', // allow all users
                'actions' => array('index','viewNotice','searchNotice','displayNotice'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
         public function getSteps()
    {
        return array(
                        array('label'=>'User','icon'=>'edit', 'url'=>array('/notice/notice/')),
                        '',
                        array('label'=>'NOTICE'),
                        '',                     
                        array('label'=>'View Notices', 'url'=>array('/notice/notice/viewNotice')),
 
                        '',
                       
            
                    );
    }

	public function actionIndex()
	{
		$this->render('index');
	}
       
             
        public function actionViewNotice()
	{
		$model=new NOTICENOTICE('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NOTICENOTICE']))
			$model->attributes=$_GET['NOTICENOTICE'];

		$this->render('viewNotice',array(
			'model'=>$model,
		));
	}
        public function actionSearchNotice($title)
        {
            $model=  NOTICENOTICE::model()->findByAttributes(array('NT_TITLE'=>$title));
            if ($model != NULL) {
               
                $this->render('viewNotice', array('model'=>$model));
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
               
            }else {
                throw new CHttpException(404, 'Notice not found :( ');
            }
        } 
        public function actionDisplayNotice($id)
{
    $model=  NOTICENOTICE::model()->findByPk($id);
    $model->NT_FILE_CONTENT=$model->NT_FILE_CONTENT->load();
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Transfer-Encoding: binary');
    header('Content-length: '.$model->NT_FILE_SIZE);
    header('Content-Type: '.$model->NT_FILE_TYPE);
    header('Content-Disposition: attachment; filename='.$model->NT_FILE_NAME);
 
        echo $model->NT_FILE_CONTENT;
}
        
   
}