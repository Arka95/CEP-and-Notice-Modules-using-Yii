<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NoticesuperadminController extends Controller {
    //public $layout='//layouts/noticeSuperadminLayout';
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
            array('allow', // deny all users
                'actions' => array('index','createrole', 'viewRole', 'updateRole', 'deleteRole', 'adminRole', 'createUser', 'viewUser', 'updateUser', 'deleteUser', 'adminUser', 'createSection', 'viewSection', 'updateSection', 'deleteSection', 'adminSection'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCreateUser() {
         $model = new NOTICEUSER();
        if (isset($_POST['NOTICEUSER'])) {
            
            $date = new DateTime();
            $model->attributes = $_POST['NOTICEUSER'];
            $model->NT_USR_CREATED_BY = 1;
            $model->NT_USR_CREATED_ON = $date->getTimestamp();
            $model->NT_USR_UPDATED_ON = $date->getTimestamp();
            $user=  EUSER::model()->findByAttributes(array('AP_PERID'=>$model->NT_USR_PERID));
            $model->NT_USR_EMAIL=$user->AP_EMAIL;
            $model->NT_USR_NAME=$user->AP_NAME;
            
            if ($model->save()) {
                $this->redirect(array('viewUser', 'id' => $model->NT_USR_ID));
            }
        }

        $this->render('createUser', array('model' => $model));
    }

    public function actionDeleteUser($id) {
         if (Yii::app()->request->isPostRequest) {
            $model = NOTICEUSER::model()->findByPk($id);
            if ($model != NULL) {
                $model->delete();
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }else {
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionUpdateUser($id) {
          $model = NOTICEUSER::model()->findByPk($id);
        if ($model != NULL) {
            if (isset($_POST['NOTICEUSER'])) {
                $date = new DateTime();
                $model->attributes = $_POST['NOTICEUSER'];
                 $model->NT_USR_UPDATED_ON = $date->getTimestamp();
                $dateTime = DateTime::createFromFormat('m-d-Y H:i:s',  $model->NT_USR_CREATED_ON); 
                $model->NT_USR_CREATED_ON=  $dateTime->getTimestamp();
                if ($model->save()) {
                    $this->redirect(array('viewUser', 'id' => $model->NT_USR_ID));
                }
            }
            $this->render('updateUser', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionViewUser($id) {
         $model = NOTICEUSER::model()->findByPk($id);
        if ($model != NULL) {
            $this->render('viewUser', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }
    public function actionAdminUser() {
        $modelName = 'NOTICEUSER';
        $criteria = new CDbCriteria;
        // $criteria->with=array('dAPAYGRADE');
        $criteria->order = 'NT_USR_ID ASC';

        $modelDisplay = new CActiveDataProvider('NOTICEUSER', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pagesize' => 30,
            ),
        ));
        $this->render('adminUser', array('modelDisplay' => $modelDisplay));
    }

    //-----------------------------------------------------------------------------------------------------
    public function actionViewSection($id) {
         $model = NOTICESECTION::model()->findByPk($id);
        if ($model != NULL) {
            $this->render('viewSection', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionCreateSection() {
        $model = new NOTICESECTION();
        if (isset($_POST['NOTICESECTION'])) {
            $date = new DateTime();
            $model->attributes = $_POST['NOTICESECTION'];
            $model->NT_SEC_CREATED_BY = 1;
            $model->NT_SEC_CREATED_ON = $date->getTimestamp();
            $model->NT_SEC_UPDATED_ON = $date->getTimestamp();
            if ($model->save()) {
                $this->redirect(array('viewSection', 'id' => $model->NT_SEC_ID));
            }
        }

        $this->render('createSection', array('model' => $model));
    }

    public function actionDeleteSection($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = NOTICESECTION::model()->findByPk($id);
            if ($model != NULL) {
                $model->delete();
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }else {
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        
    }

    public function actionUpdateSection($id) {
        $model = NOTICESECTION::model()->findByPk($id);
        if ($model != NULL) {
            if (isset($_POST['NOTICESECTION'])) {
                $date = new DateTime();
                $model->attributes = $_POST['NOTICESECTION'];
                $model->NT_SEC_UPDATED_ON = $date->getTimestamp();
                $dateTime = DateTime::createFromFormat('m-d-Y H:i:s',  $model->NT_SEC_CREATED_ON); 
                $model->NT_SEC_CREATED_ON=  $dateTime->getTimestamp();
                if ($model->save()) {
                    $this->redirect(array('viewSection', 'id' => $model->NT_SEC_ID));
                }
            }
            $this->render('updateSection', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }
    public function actionAdminSection() {
        $modelName = 'NOTICESECTION';
        $criteria = new CDbCriteria;
        // $criteria->with=array('dAPAYGRADE');
        $criteria->order = 'NT_SEC_ID ASC';

        $modelDisplay = new CActiveDataProvider('NOTICESECTION', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pagesize' => 30,
            ),
        ));
        $this->render('adminSection', array('modelDisplay' => $modelDisplay));
    }

    //--------------------------------------------------------------------------------------------------------
    public function actionCreateRole() {
        $model = new NOTICEROLE();
          $date = new DateTime();
        if (isset($_POST['NOTICEROLE'])) {
            $model->attributes = $_POST['NOTICEROLE'];
            $model->NT_RL_CREATED_BY =1;
            $model->NT_RL_CREATED_ON = $date->getTimestamp();
            $model->NT_RL_UPDATED_ON = $date->getTimestamp();
            if ($model->save()) {
                $this->redirect(array('viewRole', 'id' => $model->NT_RL_ID));
            }
        }

        $this->render('createRole', array('model' => $model));
    }

    public function actionUpdateRole($id) {
        $model = NOTICEROLE::model()->findByPk($id);
        $date = new DateTime();
        if ($model != NULL) {
            if (isset($_POST['NOTICEROLE'])) {
                $model->attributes = $_POST['NOTICEROLE'];
                $model->NT_RL_UPDATED_ON = $date->getTimestamp();
                if ($model->save()) {
                    $this->redirect(array('viewRole', 'id' => $model->NT_RL_ID));
                }
            }
            $this->render('updateRole', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionDeleteRole($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = NOTICEROLE::model()->findByPk($id);
            if ($model != NULL) {
                $model->delete();

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }else {
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionViewRole($id) {
        $model = NOTICEROLE::model()->findByPk($id);
        if ($model != NULL) {
            $this->render('viewRole', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionAdminRole() {
        $modelName = 'NOTICEROLE';
        $criteria = new CDbCriteria;
        // $criteria->with=array('dAPAYGRADE');
        $criteria->order = 'NT_RL_ID ASC';

        $modelDisplay = new CActiveDataProvider('NOTICEROLE', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pagesize' => 30,
            ),
        ));
        $this->render('adminRole', array('modelDisplay' => $modelDisplay));
    }
    
    public function getSteps()
    {
        return array(
                        array('label'=>'Notice Superadmin','icon'=>'edit', 'url'=>array('/noticeadmin/noticesuperadmin/')),
                        '',
                        array('label'=>'SECTION'),
                        '',
                        array('label'=>'Create New Section', 'url'=>array('/noticeadmin/noticesuperadmin/createSection')),
                        array('label'=>'View Sections', 'url'=>array('/noticeadmin/noticesuperadmin/adminSection')),
                        
                        
                        '',
                        array('label'=>'USERS'),
                        '',
                        array('label'=>'Create New User', 'url'=>array('/noticeadmin/noticesuperadmin/createUser')),
                        array('label'=>'View Users', 'url'=>array('/noticeadmin/noticesuperadmin/adminUser')),
                        
                        '',
                        array('label'=>'ROLES'),
                        '',
                        array('label'=>'Create New Role', 'url'=>array('/noticeadmin/noticesuperadmin/createRole')),
                        array('label'=>'View Roles', 'url'=>array('/noticeadmin/noticesuperadmin/adminRole')),
            
                    );
    }

}
