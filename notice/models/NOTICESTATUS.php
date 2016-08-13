<?php

/**
 * This is the model class for table "NOTICE_STATUS".
 *
 * The followings are the available columns in table 'NOTICE_STATUS':
 * @property double $NT_STS_ID
 * @property string $NT_STS_DESCRIPTION
 * @property double $NT_STS_CREATED_BY
 * @property double $NT_STS_CREATED_ON
 * @property double $NT_STS_UPDATED_ON
 *
 * The followings are the available model relations:
 * @property NOTICESUPERADMIN $nTSTSCREATEDBY
 * @property NOTICENOTICE[] $nOTICENOTICEs
 */
class NOTICESTATUS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'NOTICE_STATUS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NT_STS_DESCRIPTION, NT_STS_CREATED_BY, NT_STS_CREATED_ON, NT_STS_UPDATED_ON', 'required'),
			array('NT_STS_CREATED_BY, NT_STS_CREATED_ON, NT_STS_UPDATED_ON', 'numerical'),
			array('NT_STS_DESCRIPTION', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NT_STS_ID, NT_STS_DESCRIPTION, NT_STS_CREATED_BY, NT_STS_CREATED_ON, NT_STS_UPDATED_ON', 'safe', 'on'=>'search'),
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
			'nTSTSCREATEDBY' => array(self::BELONGS_TO, 'NOTICESUPERADMIN', 'NT_STS_CREATED_BY'),
			'nOTICENOTICEs' => array(self::HAS_MANY, 'NOTICENOTICE', 'NT_STATUS_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NT_STS_ID' => 'Nt Sts',
			'NT_STS_DESCRIPTION' => 'Status Description',
			'NT_STS_CREATED_BY' => 'Created By',
			'NT_STS_CREATED_ON' => 'Created On',
			'NT_STS_UPDATED_ON' => 'Updated On',
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

		$criteria->compare('NT_STS_ID',$this->NT_STS_ID);
		$criteria->compare('NT_STS_DESCRIPTION',$this->NT_STS_DESCRIPTION,true);
		$criteria->compare('NT_STS_CREATED_BY',$this->NT_STS_CREATED_BY);
		$criteria->compare('NT_STS_CREATED_ON',$this->NT_STS_CREATED_ON);
		$criteria->compare('NT_STS_UPDATED_ON',$this->NT_STS_UPDATED_ON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NOTICESTATUS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
