<?php

class CepintimationController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/cepLayout';

    /**
     * @return array action filters
     */
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'selectfirm', 'create', 'visitor',
                    'delete', 'officersToMeet', 'intimationDetails',
                    'next', 'back', 'approve', 'reject'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        Yii::app()->session['intimation_step'] = rand(1111, 9999) . '1' . rand(11111, 99999);
        Yii::app()->session['cep_title'] = "CEP Intimation";
        $this->redirect(array('create'));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

//    public function actionSelectfirm($id) {
//        
//        $this->render('view', array(
//            'model' => $this->loadModel($id),
//        ));
//    } 
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $this->checkCurrentStep(1);
        Yii::app()->session['cep_title'] = "Fill up intimation";
        if (Yii::app()->session['intimation_id'] != null)
            $model = CEPINTIMATION::model()->findByPk(Yii::app()->session['intimation_id']);
        else
            $model = new CEPINTIMATION;

        $newdate = new DateTime();
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['CEPINTIMATION'])) {
           
            $model->attributes = $_POST['CEPINTIMATION'];
 $model->CI_INTIMATION_DATE = $newdate->getTimestamp();
            if ($model->CF_NAME_SEARCH != 'other') {
                $model->CI_CF_ID = $model->CF_NAME_SEARCH;
            } else {
                $modelFirm = new CEPFIRM;
                $modelFirm->CF_ADDRESS = $model->CF_ADDRESS;
                $modelFirm->CF_CITY = $model->CF_CITY;
                $modelFirm->CF_COUNTRY = $model->CF_COUNTRY;
                $modelFirm->CF_NAME = $model->CF_NAME;
                $modelFirm->CF_PIN = $model->CF_PIN;
                $modelFirm->CF_STATE = $model->CF_STATE;
                $modelFirm->CF_TYPE = $model->CF_TYPE;

                if ($modelFirm->save())
                    $model->CI_CF_ID = $modelFirm->CF_ID;
            }
            if ($model->save()) {
                Yii::app()->session['intimation_id'] = $model->CI_ID;
                Yii::app()->session['intimation_step'] = rand(1111, 9999) . '2' . rand(11111, 99999);
                $this->redirect(array('visitor'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionVisitor($type = '') {
        $this->checkCurrentStep(2);
        Yii::app()->session['cep_title'] = "Add Visitors";
        $modelName = 'CEPVISITOR';
        $criteria = new CDbCriteria;
        //$criteria->with=array('vacPostCode.pcodeAdvt','vacPostCode.pcodeCat');

        $criteria->addCondition("CV_CI_ID=" . Yii::app()->session['intimation_id']);
        $criteria->order = 'CV_ID ASC';

        $modelDisplay = new CActiveDataProvider('CEPVISITOR', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pagesize' => 30,
            ),
        ));
        $modelVisitors = CEPVISITOR::model()->findAllByAttributes(array('CV_CI_ID' => Yii::app()->session['intimation_id']));
        if (count($modelVisitors) === 0)
            $type = 'new';
        $modelNew = null;
        if ($type === 'new') {
            $modelNew = new CEPVISITOR();
        } elseif (!empty($type)) {
            $modelNew = $this->loadModel($type, $modelName);
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CEPVISITOR'])) {
            $modelNew->attributes = $_POST['CEPVISITOR'];
            $modelNew->CV_CI_ID = Yii::app()->session['intimation_id'];

            if ($modelNew->save())
                $this->redirect(array('visitor'));
        }

        $this->render('visitor', array(
            'modelNew' => $modelNew, 'modelDisplay' => $modelDisplay
        ));
    }

    public function actionOfficersToMeet($type = '') {
        $this->checkCurrentStep(3);
        Yii::app()->session['cep_title'] = "Add Officers to be visited";
        $modelName = 'CEPOFFICERS';
        $criteria = new CDbCriteria;
        $criteria->addCondition("CO_CI_ID=" . Yii::app()->session['intimation_id']);

        $criteria->order = 'CO_ID ASC';

        $modelDisplay = new CActiveDataProvider('CEPOFFICERS', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pagesize' => 30,
            ),
        ));
        $modelOfficers = CEPOFFICERS::model()->findAllByAttributes(array('CO_CI_ID' => Yii::app()->session['intimation_id']));
        if (count($modelOfficers) === 0)
            $type = 'new';
        $modelNew = null;
        if ($type === 'new') {
            $modelNew = new CEPOFFICERS();
        } elseif (!empty($type)) {
            $modelNew = $this->loadModel($type, $modelName);
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CEPOFFICERS'])) {
            $modelNew->attributes = $_POST['CEPOFFICERS'];
            $modelNew->CO_CI_ID = Yii::app()->session['intimation_id'];

            if ($modelNew->save())
                $this->redirect(array('officersToMeet'));
        }

        $this->render('officersToMeet', array(
            'modelNew' => $modelNew, 'modelDisplay' => $modelDisplay
        ));
    }

    public function actionIntimationDetails() {
        $this->checkCurrentStep(4);
        Yii::app()->session['cep_title'] = "Final CEP form and submit";
        $modelIntimation = CEPINTIMATION::model()->findByPk(Yii::app()->session['intimation_id']);

        $modelVisitors = CEPVISITOR::model()->findAllByAttributes(array('CV_CI_ID' => Yii::app()->session['intimation_id'])); //$modelIntimation->cEPVISITORs;
        $modelOfficers = CEPOFFICERS::model()->findAllByAttributes(array('CO_CI_ID' => Yii::app()->session['intimation_id']));
        $modelFirm = CEPFIRM::model()->findByAttributes(array('CF_ID' => $modelIntimation->CI_CF_ID));
        if (isset($_POST['submitCEP'])) {
            $modelIntimation->CI_STATUS = 'Pending';
            $hashkey = rand(1111111111, 9999999999) . $modelIntimation->CI_ID . rand(1111111111, 9999999999);
            $hashkey = sha1($hashkey);
            $modelIntimation->CI_KEY = $hashkey;

            if ($modelIntimation->save()) {
                //send mail to approving authority
                $modelApprovingAuthority = EUSER::model()->findByAttributes(array('AP_PERID' => $modelIntimation->CI_AUTH_BY));
                $modelEmail = new DEPACCOMCONSOLEEMAIL();
                $modelEmail->DA_EMAIL_TO_ADDRESS = $modelApprovingAuthority->AP_EMAIL;
                $modelEmail->DA_EMAIL_TO_NAME = ucwords(strtolower($modelApprovingAuthority->AP_NAME));
                $modelEmail->DA_EMAIL_FROM_ADDRESS = "cep@vecc.gov.in";
                $modelEmail->DA_EMAIL_SUBJECT = "CEP intimation approval";
                $url = Yii::app()->createAbsoluteUrl('cep/cepintimation/approve', array('id' => $hashkey));
                $modelEmail->DA_EMAIL_BODY = '<strong>Dear Sir/Madam,</strong><BR />'
                        . 'A Casual Entry Permit(CEP) intimation was requested by ....'
                        . CHtml::link('Approve', $url)
                        . ' or '
                        . CHtml::link('Reject', $url)

                ;
                $modelEmail->DA_EMAIL_STATUS = 1;
                // upto above code to remove in next year
                /*
                  $handleAparEmail= new HandleAparEmail();
                  $status=$handleAparEmail->SendAparForwardMail(Yii::app()->session['apar_crid']);
                  if($status){
                 * 
                 */
                if ($modelEmail->save()) {
                    Yii::app()->user->setFlash('success', "<strong>Intimation has been submitted successfully. </strong> ");
                    //send data to mail table
                    //$this->refresh();
                    Yii::app()->session['intimation_step'] = rand(1111, 9999) . "1" . rand(11111, 99999);
                    Yii::app()->session['intimation_id'] = '';
                }
            }
        }


        $this->render('viewIntimationDetails', array('modelIntimation' => $modelIntimation, 'modelVisitors' => $modelVisitors,
            'modelOfficers' => $modelOfficers,
            'modelFirm' => $modelFirm));
    }

    public function actionApprove($id) {
        $this->layout = '//layouts/no_column';
        $modelIntimation = CEPINTIMATION::model()->findByAttributes(array('CI_KEY' => $id));
        if ($modelIntimation != NULL) {
            if ($modelIntimation->CI_STATUS === 'Pending') {
                $modelIntimation->CI_STATUS = 'Approved';
                $modelIntimation->save();
                Yii::app()->user->setFlash('success', "<strong>Intimation has been approved successfully. </strong> ");
            } else {
                Yii::app()->user->setFlash('warning', "<strong>Intimation has been already approved/rejected. </strong> ");
            }
        } else {
            Yii::app()->user->setFlash('error', "<strong>Invalid Request. </strong> ");
        }
        $this->render('ApproveRejectStatus');
    }

    public function actionReject($id) {
        $this->layout = '//layouts/no_column';
        $modelIntimation = CEPINTIMATION::model()->findByAttributes(array('CI_KEY' => $id));
        if ($modelIntimation != NULL) {
            if ($modelIntimation->CI_STATUS === 'Pending') {
                $modelIntimation->CI_STATUS = 'Rejected';
                $modelIntimation->save();
                Yii::app()->user->setFlash('success', "<strong>Intimation has been rejected. </strong> ");
            } else {
                Yii::app()->user->setFlash('warning', "<strong>Intimation has been already approved/rejected. </strong> ");
            }
        } else {
            Yii::app()->user->setFlash('error', "<strong>Invalid Request. </strong> ");
        }
        $this->render('ApproveRejectStatus');
    }

    public function loadModel($id, $modelName) {
        //$model=DisabilityQuota::model()->findByPk($id);
        $model = $modelName::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionDelete($id, $modelName) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id, $modelName)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['CEPINTIMATION'])) {
            $model->attributes = $_POST['CEPINTIMATION'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->CI_ID));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    /*
      public function actionDelete($id) {
      if (Yii::app()->request->isPostRequest) {
      // we only allow deletion via POST request
      $this->loadModel($id)->delete();

      // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
      if (!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
      } else
      throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
      }
     */

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new CEPINTIMATION('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CEPINTIMATION']))
            $model->attributes = $_GET['CEPINTIMATION'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    /*
      public function loadModel($id) {
      $model = CEPINTIMATION::model()->findByPk($id);
      if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
      return $model;
      }
     * 
     */

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cepintimation-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function checkCurrentStep($id) {

        $currentStep = (int) substr(Yii::app()->session['intimation_step'], 4, strlen(Yii::app()->session['intimation_step']) - 9);
        if ($id === $currentStep) {
            
        } else {
            Yii::app()->user->setFlash('error', '<strong> Use "Back" and "Next" buttons for navigation </strong> ');
            $this->redirectUrl(1);
        }
    }

    public function actionNext() {
        $nextStep = 1;
        $currentStep = (int) substr(Yii::app()->session['intimation_step'], 4, strlen(Yii::app()->session['intimation_step']) - 9);
        if ($currentStep < 5) {
            $nextStep = $currentStep + 1;
        }


        $this->redirectUrl($nextStep);
    }

    public function actionBack() {
        $prevStep = 1;

        $currentStep = (int) substr(Yii::app()->session['intimation_step'], 4, strlen(Yii::app()->session['intimation_step']) - 9);

        if ($currentStep > 1) {
            $prevStep = $currentStep - 1;
        }
        $this->redirectUrl($prevStep);
    }

    protected function redirectUrl($id) {
        Yii::app()->session['intimation_step'] = rand(1111, 9999) . $id . rand(11111, 99999);

        switch ($id) {



            case 1:
                $this->redirect(array('cepintimation/create'));
                break;
            case 2:
                $this->redirect(array('cepintimation/visitor'));
                break;
            case 3:

                $this->redirect(array('cepintimation/OfficersToMeet'));
                break;
            case 4:
                $this->redirect(array('cepintimation/intimationDetails'));
                break;
            case 5:
                $this->redirect(array('cepintimation/submit'));
                break;

            default:
                $this->redirect(array('index'));
                break;
        }
    }

    public function getBackNext() {
        $currentStep = (int) substr(Yii::app()->session['intimation_step'], 4, strlen(Yii::app()->session['intimation_step']) - 9);
        $button = array();
        if ($currentStep > 1) {

            if ($currentStep === 4) {
                $button[0]['label'] = 'Back';
                $button[0]['type'] = 'danger';
                $button[0]['url'] = Yii::app()->createUrl('cep/cepintimation/back');
                $button[0]['icon'] = 'arrow-left';
            } else {
                $button[0]['label'] = 'Back';
                $button[0]['type'] = 'danger';
                $button[0]['url'] = Yii::app()->createUrl('cep/cepintimation/back');
                $button[0]['icon'] = 'arrow-left';

                $button[1]['label'] = 'Next';
                $button[1]['type'] = 'info';
                $button[1]['url'] = Yii::app()->createUrl('cep/cepintimation/next');
                $button[1]['icon'] = 'arrow-right';
            }
        } else {
            $button[1]['label'] = 'Next';
            $button[1]['type'] = 'info';
            $button[1]['url'] = Yii::app()->createUrl('cep/cepintimation/next');
            $button[1]['icon'] = 'arrow-right';
        }

        return $button;
    }

    public function getSteps() {
        if (Yii::app()->session['intimation_step'] != null) {
            $model_Cr = CRRELESE::model()->findByPk(Yii::app()->session['intimation_step']);

            $steps = array(
                array('label' => 'CEP Intimation'),
                '',
                array('label' => '1. Fill up intimation details', 'url' => array('/cep/cepintimation/create')),
                '',
                array('label' => '2. Visitor Details', 'url' => array('/cep/cepintimation/visitor')),
                '',
                array('label' => '3. Officers to be Visited', 'url' => array('/cep/cepintimation/OfficersToMeet')),
                '',
                array('label' => '4. View Form', 'url' => array('/cep/cepintimation/intimationDetails')),
//                    '',
//                    array('label'=>'5. Put Other Gradings', 'url'=>array('/evaluateapar/putOtherGradings')),
//                    '',
//                    array('label'=>'6. View APAR and Forward to next level', 'url'=>array('/evaluateapar/acceptAndForward')),
            );
        } else {
            
        }
        return $steps;
    }

}
