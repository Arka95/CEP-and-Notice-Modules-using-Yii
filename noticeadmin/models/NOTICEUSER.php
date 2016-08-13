<?php

/**
 * This is the model class for table "NOTICE_USER".
 *
 * The followings are the available columns in table 'NOTICE_USER':
 * @property double $NT_USR_ID
 * @property string $NT_USR_EMAIL
 * @property double $NT_USR_ROLE
 * @property double $NT_USR_PERID
 * @property string $NT_USR_NAME
 * @property double $NT_USR_SECTION
 * @property double $NT_USR_CREATED_BY
 * @property double $NT_USR_CREATED_ON
 * @property double $NT_USR_UPDATED_ON
 *
 * The followings are the available model relations:
 * @property NOTICEROLE $nTUSRROLE
 * @property NOTICESECTION $nTUSRSECTION
 * @property NOTICESUPERADMIN $nTUSRCREATEDBY
 */
class NOTICEUSER extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'NOTICE_USER';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NT_USR_EMAIL, NT_USR_ROLE, NT_USR_PERID, NT_USR_NAME, NT_USR_SECTION, NT_USR_CREATED_BY, NT_USR_CREATED_ON, NT_USR_UPDATED_ON', 'required'),
			array('NT_USR_ROLE, NT_USR_PERID, NT_USR_SECTION, NT_USR_CREATED_BY, NT_USR_CREATED_ON, NT_USR_UPDATED_ON', 'numerical'),
			array('NT_USR_EMAIL, NT_USR_NAME', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NT_USR_ID, NT_USR_EMAIL, NT_USR_ROLE, NT_USR_PERID, NT_USR_NAME, NT_USR_SECTION, NT_USR_CREATED_BY, NT_USR_CREATED_ON, NT_USR_UPDATED_ON', 'safe', 'on'=>'search'),
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
			'nTUSRROLE' => array(self::BELONGS_TO, 'NOTICEROLE', 'NT_USR_ROLE'),
			'nTUSRSECTION' => array(self::BELONGS_TO, 'NOTICESECTION', 'NT_USR_SECTION'),
			'nTUSRCREATEDBY' => array(self::BELONGS_TO, 'NOTICESUPERADMIN', 'NT_USR_CREATED_BY'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NT_USR_ID' => ' User Id',
			'NT_USR_EMAIL' => 'Email',
			'NT_USR_ROLE' => 'Role',
			'NT_USR_PERID' => 'Period',
			'NT_USR_NAME' => 'Name',
			'NT_USR_SECTION' => 'Section',
			'NT_USR_CREATED_BY' => ' Created By',
			'NT_USR_CREATED_ON' => ' Created On',
			'NT_USR_UPDATED_ON' => ' Updated On',
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

		$criteria->compare('NT_USR_ID',$this->NT_USR_ID);
		$criteria->compare('NT_USR_EMAIL',$this->NT_USR_EMAIL,true);
		$criteria->compare('NT_USR_ROLE',$this->NT_USR_ROLE);
		$criteria->compare('NT_USR_PERID',$this->NT_USR_PERID);
		$criteria->compare('NT_USR_NAME',$this->NT_USR_NAME,true);
		$criteria->compare('NT_USR_SECTION',$this->NT_USR_SECTION);
		$criteria->compare('NT_USR_CREATED_BY',$this->NT_USR_CREATED_BY);
		$criteria->compare('NT_USR_CREATED_ON',$this->NT_USR_CREATED_ON);
		$criteria->compare('NT_USR_UPDATED_ON',$this->NT_USR_UPDATED_ON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
         public function beforeSave() {
    
    return parent::beforeSave();
}
    public function afterFind()
        {
                 if (!empty($this->NT_USR_CREATED_ON )) {    
                         $this->NT_USR_CREATED_ON =date('m-d-Y H:i:s',  $this->NT_USR_CREATED_ON );
                }
                if (!empty($this->NT_USR_UPDATED_ON )) {    
                         $this->NT_USR_UPDATED_ON=date('m-d-Y H:i:s', $this->NT_USR_UPDATED_ON);
                }
                parent::afterFind();
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NOTICEUSER the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
