<?php

/**
 * This is the model class for table "NOTICE_ROLE".
 *
 * The followings are the available columns in table 'NOTICE_ROLE':
 * @property double $NT_RL_ID
 * @property string $NT_RL_DESCRIPTION
 * @property double $NT_RL_CREATED_BY
 * @property double $NT_RL_CREATED_ON
 * @property double $NT_RL_UPDATED_ON
 *
 * The followings are the available model relations:
 * @property NOTICESUPERADMIN $nTRLCREATEDBY
 * @property NOTICEUSER[] $nOTICEUSERs
 */
class NOTICEROLE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'NOTICE_ROLE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NT_RL_DESCRIPTION, NT_RL_CREATED_BY, NT_RL_CREATED_ON, NT_RL_UPDATED_ON', 'required'),
			array('NT_RL_CREATED_BY, NT_RL_CREATED_ON, NT_RL_UPDATED_ON', 'numerical'),
			array('NT_RL_DESCRIPTION', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NT_RL_ID, NT_RL_DESCRIPTION, NT_RL_CREATED_BY, NT_RL_CREATED_ON, NT_RL_UPDATED_ON', 'safe', 'on'=>'search'),
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
			'nTRLCREATEDBY' => array(self::BELONGS_TO, 'NOTICESUPERADMIN', 'NT_RL_CREATED_BY'),
			'nOTICEUSERs' => array(self::HAS_MANY, 'NOTICEUSER', 'NT_USR_ROLE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NT_RL_ID' => 'Nt Rl',
			'NT_RL_DESCRIPTION' =>'Role Description',
			'NT_RL_CREATED_BY' => 'Created By',
			'NT_RL_CREATED_ON' => 'Created On',
			'NT_RL_UPDATED_ON' => 'Updated On',
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

		$criteria->compare('NT_RL_ID',$this->NT_RL_ID);
		$criteria->compare('NT_RL_DESCRIPTION',$this->NT_RL_DESCRIPTION,true);
		$criteria->compare('NT_RL_CREATED_BY',$this->NT_RL_CREATED_BY);
		$criteria->compare('NT_RL_CREATED_ON',$this->NT_RL_CREATED_ON);
		$criteria->compare('NT_RL_UPDATED_ON',$this->NT_RL_UPDATED_ON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function beforeSave() {
    
    return parent::beforeSave();
}
    public function afterFind()
        {
                 if (!empty($this->NT_RL_CREATED_ON )) {    
                         $this->NT_RL_CREATED_ON =date('m-d-Y H:i:s',  $this->NT_RL_CREATED_ON );
                }
                if (!empty($this->NT_RL_UPDATED_ON )) {    
                         $this->NT_RL_UPDATED_ON=date('m-d-Y H:i:s', $this->NT_RL_UPDATED_ON);
                }
                parent::afterFind();
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NOTICEROLE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
