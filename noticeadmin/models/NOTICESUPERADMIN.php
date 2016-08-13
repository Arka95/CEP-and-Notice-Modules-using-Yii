<?php

/**
 * This is the model class for table "NOTICE_SUPERADMIN".
 *
 * The followings are the available columns in table 'NOTICE_SUPERADMIN':
 * @property double $NT_SUP_ID
 * @property double $NT_SUP_PERID
 * @property string $NT_SUP_EMAIL
 * @property string $NT_SUP_NAME
 *
 * The followings are the available model relations:
 * @property NOTICEROLE[] $nOTICEROLEs
 * @property NOTICESTATUS[] $nOTICESTATUSes
 * @property NOTICEUSER[] $nOTICEUSERs
 * @property NOTICESECTION[] $nOTICESECTIONs
 */
class NOTICESUPERADMIN extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'NOTICE_SUPERADMIN';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NT_SUP_PERID, NT_SUP_EMAIL, NT_SUP_NAME', 'required'),
			array('NT_SUP_PERID', 'numerical'),
			array('NT_SUP_EMAIL, NT_SUP_NAME', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NT_SUP_ID, NT_SUP_PERID, NT_SUP_EMAIL, NT_SUP_NAME', 'safe', 'on'=>'search'),
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
			'nOTICEROLEs' => array(self::HAS_MANY, 'NOTICEROLE', 'NT_RL_CREATED_BY'),
			'nOTICESTATUSes' => array(self::HAS_MANY, 'NOTICESTATUS', 'NT_STS_CREATED_BY'),
			'nOTICEUSERs' => array(self::HAS_MANY, 'NOTICEUSER', 'NT_USR_CREATED_BY'),
			'nOTICESECTIONs' => array(self::HAS_MANY, 'NOTICESECTION', 'NT_SEC_CREATED_BY'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NT_SUP_ID' => 'SuperAdmin Id',
			'NT_SUP_PERID' => ' Perid',
			'NT_SUP_EMAIL' => 'Email',
			'NT_SUP_NAME' => 'Administrator',
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

		$criteria->compare('NT_SUP_ID',$this->NT_SUP_ID);
		$criteria->compare('NT_SUP_PERID',$this->NT_SUP_PERID);
		$criteria->compare('NT_SUP_EMAIL',$this->NT_SUP_EMAIL,true);
		$criteria->compare('NT_SUP_NAME',$this->NT_SUP_NAME,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NOTICESUPERADMIN the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
