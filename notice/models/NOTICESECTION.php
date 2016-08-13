<?php

/**
 * This is the model class for table "NOTICE_SECTION".
 *
 * The followings are the available columns in table 'NOTICE_SECTION':
 * @property double $NT_SEC_ID
 * @property string $NT_SEC_NAME
 * @property double $NT_SEC_CREATED_BY
 * @property double $NT_SEC_CREATED_ON
 * @property double $NT_SEC_UPDATED_ON
 *
 * The followings are the available model relations:
 * @property NOTICEUSER[] $nOTICEUSERs
 * @property NOTICESUPERADMIN $nTSECCREATEDBY
 * @property NOTICENOTICE[] $nOTICENOTICEs
 */
class NOTICESECTION extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'NOTICE_SECTION';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NT_SEC_NAME, NT_SEC_CREATED_BY, NT_SEC_CREATED_ON, NT_SEC_UPDATED_ON', 'required'),
            array('NT_SEC_CREATED_BY, NT_SEC_CREATED_ON, NT_SEC_UPDATED_ON', 'numerical'),
            array('NT_SEC_NAME', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('NT_SEC_ID, NT_SEC_NAME, NT_SEC_CREATED_BY, NT_SEC_CREATED_ON, NT_SEC_UPDATED_ON', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nOTICEUSERs' => array(self::HAS_MANY, 'NOTICEUSER', 'NT_USR_SECTION'),
            'nTSECCREATEDBY' => array(self::BELONGS_TO, 'NOTICESUPERADMIN', 'NT_SEC_CREATED_BY'),
            'nOTICENOTICEs' => array(self::HAS_MANY, 'NOTICENOTICE', 'NT_UPLOADEDE_BY'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'NT_SEC_ID' => 'Section ID',
            'NT_SEC_NAME' => 'Section Name',
            'NT_SEC_CREATED_BY' => 'Section Created By',
            'NT_SEC_CREATED_ON' => 'Section Created On',
            'NT_SEC_UPDATED_ON' => 'Section Updated On',
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

        $criteria->compare('NT_SEC_ID', $this->NT_SEC_ID);
        $criteria->compare('NT_SEC_NAME', $this->NT_SEC_NAME, true);
        $criteria->compare('NT_SEC_CREATED_BY', $this->NT_SEC_CREATED_BY);
        $criteria->compare('NT_SEC_CREATED_ON', $this->NT_SEC_CREATED_ON);
        $criteria->compare('NT_SEC_UPDATED_ON', $this->NT_SEC_UPDATED_ON);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
//        if (!empty($this->NT_SEC_CREATED_ON )) 
//        {
//            $this->NT_SEC_CREATED_ON =  $this->NT_SEC_CREATED_ON->getTimestamp();
//        }
        
        

        return parent::beforeSave();
    }
    public function afterFind()
        {
                 if (!empty($this->NT_SEC_CREATED_ON )) {    
                         $this->NT_SEC_CREATED_ON =date('m-d-Y H:i:s',  $this->NT_SEC_CREATED_ON );
                }
                if (!empty($this->NT_SEC_UPDATED_ON )) {    
                         $this->NT_SEC_UPDATED_ON=date('m-d-Y H:i:s', $this->NT_SEC_UPDATED_ON);
                }
                parent::afterFind();
        }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NOTICESECTION the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
