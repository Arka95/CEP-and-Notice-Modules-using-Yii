<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NoticeadminController extends Controller {

//public $layout='//layouts/noticeAdminLayout';
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
                'actions' => array('index', 'createNotice', 'updateNotice', 'viewNotice', 'adminNotice', 'deleteNotice', 'displayNotice'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function getSteps() {
        return array(
            array('label' => 'Notice Admin', 'icon' => 'edit', 'url' => array('/noticeadmin/noticeadmin/')),
            '',
            array('label' => 'NOTICE'),
            '',
            array('label' => 'Create New Notice', 'url' => array('/noticeadmin/noticeadmin/createNotice')),
            array('label' => 'View Notices', 'url' => array('/noticeadmin/noticeadmin/adminNotice')),
            '',
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCreateNotice() {
        $model = new NOTICENOTICE('new');
        //$model->scenario='create';
        $date = new DateTime();
        if (isset($_POST['NOTICENOTICE'])) {
            $model->attributes = $_POST['NOTICENOTICE'];
            //$model->NT_REF_NUMBER = "6ety"; 
            $model->NT_UPDATED_ON = $date->getTimestamp();
            $model->NT_UPLOADEDE_BY = 2;
            $model->NT_CREATED_ON = $date->getTimestamp();
            $model->NT_STATUS_ID = 1;
            $file = CUploadedFile::getInstance($model, 'uploadedFile');

            echo $file->name;
            $model->NT_FILE_NAME = $file->name;
            $model->NT_FILE_SIZE = $file->size;
            $model->NT_FILE_TYPE = $file->type;
            $fp = fopen($file->tempName, 'r');
            $content = fread($fp, filesize($file->tempName));
            fclose($fp);
            $model->NT_FILE_CONTENT = $content;
//                $model->NT_FILE_CONTENT = file_get_contents($file->tempName);


            if ($model->save()) {

                $this->redirect(array('viewNotice', 'id' => $model->NT_ID));
            }
        }
        $this->render('createNotice', array('model' => $model));
    }

    public function actionDeleteNotice($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = NOTICENOTICE::model()->findByPk($id);
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

    public function actionUpdateNotice($id) {
        $model = NOTICENOTICE::model()->findByPk($id);
        $model->NT_FILE_CONTENT=$model->NT_FILE_CONTENT->load();
        $model->setScenario('old');
        $date = new DateTime();
        if ($model != NULL) {

            if (isset($_POST['NOTICENOTICE'])) {

                $model->attributes = $_POST['NOTICENOTICE'];
                $file = CUploadedFile::getInstance($model, 'uploadedFile');
                if ($file != NULL) {
                    

                    //echo $file->name;
                    $model->NT_FILE_NAME = $file->name;
                    $model->NT_FILE_SIZE = $file->size;
                    $model->NT_FILE_TYPE = $file->type;
                    $fp = fopen($file->tempName, 'r');
                    $content = fread($fp, filesize($file->tempName));
                    fclose($fp);
                    $model->NT_FILE_CONTENT = $content;
                }

                
                $model->NT_UPDATED_ON = $date->getTimestamp();
//                echo "Pub date:$model->NT_PUB_DATE";
                if ($model->save()) {
                    $this->redirect(array('viewNotice', 'id' => $model->NT_ID));
                }
            }
            $this->render('updateNotice', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionViewNotice($id) {
        $model = NOTICENOTICE::model()->findByPk($id);
        $model->NT_FILE_CONTENT = $model->NT_FILE_CONTENT->load();
        if ($model != NULL) {
            $this->render('viewNotice', array('model' => $model));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionDisplayNotice($id) {
        $model = NOTICENOTICE::model()->findByPk($id);
        $model->NT_FILE_CONTENT = $model->NT_FILE_CONTENT->load();
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-length: ' . $model->NT_FILE_SIZE);
        header('Content-Type: ' . $model->NT_FILE_TYPE);
        header('Content-Disposition: attachment; filename=' . $model->NT_FILE_NAME);

        echo $model->NT_FILE_CONTENT;
    }

    public function actionAdminNotice() {
        $model = new NOTICENOTICE('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NOTICENOTICE']))
            $model->attributes = $_GET['NOTICENOTICE'];

        $this->render('adminNotice', array(
            'model' => $model,
        ));
    }

}
