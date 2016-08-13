<?php

/**
 * This is the model class for table "CEP_VISITOR".
 *
 * The followings are the available columns in table 'CEP_VISITOR':
 * @property double $CV_ID
 * @property double $CV_CI_ID
 * @property string $CV_NAME
 * @property string $CV_GENDER
 * @property string $CV_OCCUPATION
 * @property string $CV_PHOTO
 *
 * The followings are the available model relations:
 * @property CEPINTIMATION $cVCI
 */
class CEPVISITOR extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CEP_VISITOR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CV_CI_ID, CV_NAME, CV_GENDER', 'required'),
			array('CV_CI_ID', 'numerical'),
			array('CV_NAME, CV_OCCUPATION', 'length', 'max'=>100),
			array('CV_GENDER', 'length', 'max'=>10),
			array('CV_PHOTO', 'length', 'max'=>4000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CV_ID, CV_CI_ID, CV_NAME, CV_GENDER, CV_OCCUPATION, CV_PHOTO', 'safe', 'on'=>'search'),
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
			'cVCI' => array(self::BELONGS_TO, 'CEPINTIMATION', 'CV_CI_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CV_ID' => 'ID',
			'CV_CI_ID' => 'CEP Form ID',
			'CV_NAME' => 'Name',
			'CV_GENDER' => 'Gender',
			'CV_OCCUPATION' => 'Occupation',
			'CV_PHOTO' => 'Photo',
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

		$criteria->compare('CV_ID',$this->CV_ID);
		$criteria->compare('CV_CI_ID',$this->CV_CI_ID);
		$criteria->compare('CV_NAME',$this->CV_NAME,true);
		$criteria->compare('CV_GENDER',$this->CV_GENDER,true);
		$criteria->compare('CV_OCCUPATION',$this->CV_OCCUPATION,true);
		$criteria->compare('CV_PHOTO',$this->CV_PHOTO,true);

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
	 * @return CEPVISITOR the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getGender() {
        return array('Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other');
    }
}
