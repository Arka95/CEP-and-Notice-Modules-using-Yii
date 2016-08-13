<?php

/**
 * This is the model class for table "CEP_OFFICERS".
 *
 * The followings are the available columns in table 'CEP_OFFICERS':
 * @property double $CO_ID
 * @property double $CO_CI_ID
 * @property double $CO_PERID
 *
 * The followings are the available model relations:
 * @property CEPINTIMATION $cOCI
 */
class CEPOFFICERS extends CActiveRecord
{
    public $CO_NAME;
    public $CO_DESIGNATION;
    public $CO_EXTN;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CEP_OFFICERS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CO_CI_ID, CO_PERID', 'required'),
			array('CO_CI_ID, CO_PERID', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CO_ID, CO_CI_ID, CO_PERID', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cOCI' => array(self::BELONGS_TO, 'CEPINTIMATION', 'CO_CI_ID'),
                    'eUSER' => array(self::BELONGS_TO, 'EUSER','CO_PERID','foreignKey' => array('CO_PERID'=> 'AP_PERID')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CO_ID' => 'Visit ID',
			'CO_CI_ID' => 'CEP ID',
			'CO_PERID' => 'Officer Perid',
                        'CO_NAME' =>'Name',
                        'CO_DESIGNATION' =>'Designation',
                        'CO_EXTN' =>'Extension number',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('CO_ID',$this->CO_ID);
		$criteria->compare('CO_CI_ID',$this->CO_CI_ID);
		$criteria->compare('CO_PERID',$this->CO_PERID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db_trainee;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CEPOFFICERS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function afterFind() {
            $euser=  EUSER::model()->findByAttributes(array('AP_PERID'=>  $this->CO_PERID));
            $this->CO_NAME=$euser->AP_NAME;
            $this->CO_DESIGNATION= $euser->AP_PRESENT_GRADE;
            $this->CO_EXTN= $euser->AP_EXTN;
        parent::afterFind();
    }
}
