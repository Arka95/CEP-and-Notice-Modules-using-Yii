<?php

/**
 * This is the model class for table "CEP_INTIMATION".
 *
 * The followings are the available columns in table 'CEP_INTIMATION':
 * @property double $CI_ID
 * @property double $CI_CF_ID
 * @property double $CI_INTIMATED_BY
 * @property double $CI_AUTH_BY
 * @property double $CI_INTIMATION_DATE
 * @property double $CI_VST_ENTRY_DATE
 * @property double $CI_VST_EXIT_DATE
 * @property string $CI_PURPOSE
 * @property double $CI_UPDATED_ON
 * @property double $CI_CREATED_ON
 * @property string $CI_STATUS
 * @property double $CI_VST_EXPECTED_ENTRY_DATE
 * @property double $CI_VST_EXPECTED_EXIT_DATE
 * @property string $CI_KEY
 * @property string $CF_TYPE
 * @property string $CF_NAME
 * @property string $CF_ADDRESS
 * @property string $CF_COUNTRY
 * @property string $CF_STATE
 * @property string $CF_CITY
 * @property integer $CF_PIN
 * The followings are the available model relations:
 * @property CEPOFFICERS[] $cEPOFFICERSs
 * @property CEPFIRM $cICF
 * @property CEPVISITOR[] $cEPVISITORs
 */
class CEPINTIMATION extends CActiveRecord {

    public $CF_NAME_SEARCH;
    public $CF_TYPE;
    public $CF_NAME;
    public $CF_ADDRESS;
    public $CF_COUNTRY;
    public $CF_COUNTRY_OTHER;
    public $CF_STATE;
    public $CF_CITY;
    public $CF_PIN;
    public $CF_STATE_OTHER;
    public $CI_PURPOSE_OTHER;
    public $CI_AUTH_BY_NAME;
    public $CI_AUTH_BY_DESIGNATION;
    public $CI_AUTH_BY_EXTN;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'CEP_INTIMATION';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CI_CF_ID', 'required'),
            array('CI_CF_ID, CI_INTIMATED_BY, CI_AUTH_BY, CI_VST_ENTRY_DATE, CI_VST_EXIT_DATE, CI_UPDATED_ON', 'numerical'),
            array('CI_PURPOSE', 'length', 'max' => 30),
            array('CI_STATUS', 'length', 'max' => 20),
            array('CI_KEY', 'length', 'max' => 1024),
            array('CF_NAME_SEARCH, CI_VST_ENTRY_DATE,  CI_INTIMATION_DATE,CI_VST_EXIT_DATE, CI_UPDATED_ON, CI_CREATED_ON, CI_VST_EXPECTED_ENTRY_DATE, CI_VST_EXPECTED_EXIT_DATE', 'safe'),
            array('CF_NAME_SEARCH, CF_TYPE, CF_NAME, CF_ADDRESS, CF_COUNTRY, CF_COUNTRY_OTHER, CF_STATE, CF_CITY, CF_PIN, CF_STATE_OTHER', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('CI_ID, CI_CF_ID, CI_INTIMATED_BY, CI_AUTH_BY, CI_INTIMATION_DATE, CI_VST_ENTRY_DATE, CI_VST_EXIT_DATE, CI_PURPOSE, CI_UPDATED_ON, CI_CREATED_ON, CI_STATUS, CI_VST_EXPECTED_ENTRY_DATE, CI_VST_EXPECTED_EXIT_DATE, CI_KEY', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cEPOFFICERSs' => array(self::HAS_MANY, 'CEPOFFICERS', 'CO_CI_ID'),
            'cICF' => array(self::BELONGS_TO, 'CEPFIRM', 'CI_CF_ID'),
            'cEPVISITORs' => array(self::HAS_MANY, 'CEPVISITOR', 'CV_CI_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'CI_ID' => 'ID',
            'CI_CF_ID' => 'Firm Id',
            'CI_INTIMATED_BY' => 'Intimated By',
            'CI_AUTH_BY' => 'Authenticated By',
            'CI_INTIMATION_DATE' => 'Intimation Date',
            'CI_VST_ENTRY_DATE' => 'Entry Date',
            'CI_VST_EXIT_DATE' => 'Exit Date',
            'CI_PURPOSE' => 'Purpose(If Other please Specify:)',
            'CI_UPDATED_ON' => 'Updated On',
            'CI_CREATED_ON' => 'Created On',
            'CI_STATUS' => 'Ci Status',
            'CI_VST_EXPECTED_ENTRY_DATE' => 'Expected Entry Date',
            'CI_VST_EXPECTED_EXIT_DATE' => 'Expected Exit Date',
            'CI_KEY' => 'Key',
            'CF_STATE_OTHER'=>'',
            'CF_STATE'=>'State',
            'CF_PIN'=>'PIN',
            'CF_CITY'=>'City',
            'CF_COUNTRY'=>'Country',
            'CF_NAME_SEARCH'=>'Firm (if other please specify)',
            'CF_TYPE'=>'Type of Firm',
            'CF_NAME'=>'Name of Firm',
            'CF_ADDRESS'=>'Address of Firm',
             'CI_PURPOSE_OTHER'=>'Specify Other Purpose:',
            
            
            
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('CI_ID', $this->CI_ID);
        $criteria->compare('CI_CF_ID', $this->CI_CF_ID);
        $criteria->compare('CI_INTIMATED_BY', $this->CI_INTIMATED_BY);
        $criteria->compare('CI_AUTH_BY', $this->CI_AUTH_BY);
        $criteria->compare('CI_INTIMATION_DATE', $this->CI_INTIMATION_DATE);
        $criteria->compare('CI_VST_ENTRY_DATE', $this->CI_VST_ENTRY_DATE);
        $criteria->compare('CI_VST_EXIT_DATE', $this->CI_VST_EXIT_DATE);
        $criteria->compare('CI_PURPOSE', $this->CI_PURPOSE, true);
        $criteria->compare('CI_UPDATED_ON', $this->CI_UPDATED_ON);
        $criteria->compare('CI_CREATED_ON', $this->CI_CREATED_ON);
        $criteria->compare('CI_STATUS', $this->CI_STATUS, true);
        $criteria->compare('CI_VST_EXPECTED_ENTRY_DATE', $this->CI_VST_EXPECTED_ENTRY_DATE);
        $criteria->compare('CI_VST_EXPECTED_EXIT_DATE', $this->CI_VST_EXPECTED_EXIT_DATE);
        $criteria->compare('CI_KEY', $this->CI_KEY, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @return CDbConnection the database connection used for this class
     */
    public function getDbConnection() {
        return Yii::app()->db_trainee;
    }

    public function beforeSave() {
        if (!empty($this->CI_VST_EXPECTED_ENTRY_DATE)) {

            $this->CI_VST_EXPECTED_ENTRY_DATE = strtotime($this->CI_VST_EXPECTED_ENTRY_DATE);
        }
        if (!empty($this->CI_VST_EXPECTED_EXIT_DATE)) {
            $this->CI_VST_EXPECTED_EXIT_DATE = strtotime($this->CI_VST_EXPECTED_EXIT_DATE);
        }
        
       
        if ($this->CF_COUNTRY != 'India') {

            $this->CF_STATE = $this->CF_STATE_OTHER;
        }
        if($this->CI_PURPOSE === 'Other'){
            $this->CI_PURPOSE= $this->CI_PURPOSE_OTHER;
            
        }
        
        return parent::beforeSave();
    }

    public function afterFind() {
        $search_array = $this->getPurpose();

        if (!$this->CF_COUNTRY === 'India') {
            $this->CF_STATE_OTHER = $this->CF_STATE;
           
                  }

        if (!empty($this->CI_VST_EXPECTED_ENTRY_DATE)) {
            $this->CI_VST_EXPECTED_ENTRY_DATE = date('m-d-Y H:i:s', $this->CI_VST_EXPECTED_ENTRY_DATE);
        }
        if (!empty($this->CI_VST_EXPECTED_EXIT_DATE)) {
            $this->CI_VST_EXPECTED_EXIT_DATE = date('m-d-Y H:i:s', $this->CI_VST_EXPECTED_EXIT_DATE);
        }

        if (!empty($this->CI_VST_ENTRY_DATE)) {
            $this->CI_VST_ENTRY_DATE = date('m-d-Y H:i:s', $this->CI_VST_ENTRY_DATE);
        }
        if (!empty($this->CI_VST_EXIT_DATE)) {
            $this->CI_VST_EXIT_DATE = date('m-d-Y H:i:s', $this->CI_VST_EXIT_DATE);
        }
        if (!empty($this->CI_INTIMATION_DATE)) {
            $this->CI_INTIMATION_DATE = date('m-d-Y H:i:s', $this->CI_INTIMATION_DATE);
        }
           if (!array_key_exists($this->CI_PURPOSE, $search_array)) {
            $this->CI_PURPOSE_OTHER = $this->CI_PURPOSE;
            
            $this->CI_PURPOSE ='Other';
        }
        $euser=  EUSER::model()->findByAttributes(array('AP_PERID'=>  $this->CI_AUTH_BY));
        $this->CI_AUTH_BY_NAME=$euser->AP_NAME;
        $this->CI_AUTH_BY_DESIGNATION= $euser->AP_PRESENT_GRADE;
        
        parent::afterFind();
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CEPINTIMATION the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPurpose() {
        return array(
            'Training' => 'Training',
            'Inspection' => 'Inspection',
            'Industrial_Visit' => 'Industrial_Visit',
            'Other' => 'Other'
        );
    }

}
