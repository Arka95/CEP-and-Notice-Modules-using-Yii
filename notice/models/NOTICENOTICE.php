<?php

/**
 * This is the model class for table "NOTICE_NOTICE".
 *
 * The followings are the available columns in table 'NOTICE_NOTICE':
 * @property double $NT_ID
 * @property string $NT_TITLE
 * @property double $NT_PUB_DATE
 * @property double $NT_EXP_DATE
 * @property string $NT_REF_NUMBER
 * @property string $NT_FILE_TYPE
 * @property double $NT_FILE_SIZE
 * @property string $NT_FILE_NAME
 * @property string $NT_FILE_CONTENT
 * @property double $NT_UPLOADEDE_BY
 * @property double $NT_CREATED_ON
 * @property double $NT_STATUS_ID
 * @property string $NT_SUBJECT
 * @property double $NT_UPDATED_ON
 *
 * The followings are the available model relations:
 * @property NOTICESECTION $nTUPLOADEDEBY
 * @property NOTICESTATUS $nTSTATUS
 */
class NOTICENOTICE extends CActiveRecord {
    public $uploadedFile;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'NOTICE_NOTICE';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NT_FILE_CONTENT,NT_TITLE, NT_PUB_DATE, NT_EXP_DATE, NT_REF_NUMBER, NT_CREATED_ON, NT_SUBJECT, NT_UPDATED_ON', 'required', 'on'=>'new'),
            array('NT_TITLE, NT_PUB_DATE, NT_EXP_DATE, NT_REF_NUMBER,  NT_SUBJECT', 'required','on'=>'old'),
            //array('NT_PUB_DATE, NT_EXP_DATE, NT_FILE_SIZE, NT_UPLOADEDE_BY, NT_CREATED_ON, NT_STATUS_ID, NT_UPDATED_ON', 'numerical'),
            array('NT_TITLE, NT_REF_NUMBER, NT_FILE_NAME', 'length', 'max' => 200),
            array('NT_FILE_TYPE', 'length', 'max' => 20),
            array( 'NT_SUBJECT', 'length', 'max' => 4000),
            array('NT_FILE_CONTENT', 'file', 'types'=>'pdf,jpg, png','maxSize' => 2048 * 1024* 10,),
        
            array('NT_ID, NT_TITLE, NT_PUB_DATE, NT_EXP_DATE, NT_REF_NUMBER, NT_FILE_TYPE, NT_FILE_SIZE, NT_FILE_NAME, NT_FILE_CONTENT, NT_UPLOADEDE_BY, NT_CREATED_ON, NT_STATUS_ID, NT_SUBJECT, NT_UPDATED_ON', 'safe', 'on' => 'search'),
        );
    }

   

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nTUPLOADEDEBY' => array(self::BELONGS_TO, 'NOTICESECTION', 'NT_UPLOADEDE_BY'),
            'nTSTATUS' => array(self::BELONGS_TO, 'NOTICESTATUS', 'NT_STATUS_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'NT_ID' => 'Notice Id',
            'NT_TITLE' => 'Title',
            'NT_PUB_DATE' => 'Publish Date',
            'NT_EXP_DATE' => 'Expiry Date',
            'NT_REF_NUMBER' => 'Referrence Number',
            'NT_FILE_TYPE' => 'File Type',
            'NT_FILE_SIZE' => 'File Size',
            'NT_FILE_NAME' => 'File Name',
            'NT_FILE_CONTENT' => 'File Content',
            'NT_UPLOADEDE_BY' => 'Uploaded By',
            'NT_CREATED_ON' => 'Created On',
            'NT_STATUS_ID' => 'Status',
            'NT_SUBJECT' => 'Subject',
            'NT_UPDATED_ON' => 'Updated On',
            'uploadedFile'=>'Upload File'
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
        $criteria->compare('NT_ID', $this->NT_ID);
        $criteria->compare('NT_TITLE', $this->NT_TITLE, true);
        $criteria->compare('NT_PUB_DATE', $this->NT_PUB_DATE);
        $criteria->compare('NT_EXP_DATE', $this->NT_EXP_DATE);
        $criteria->compare('NT_REF_NUMBER', $this->NT_REF_NUMBER, true);
        $criteria->compare('NT_FILE_CONTENT', $this->NT_FILE_CONTENT, true);
        $criteria->compare('NT_CREATED_ON', $this->NT_CREATED_ON);
        $criteria->compare('NT_STATUS_ID', $this->NT_STATUS_ID);
        $criteria->compare('NT_SUBJECT', $this->NT_SUBJECT, true);
        $criteria->compare('NT_UPDATED_ON', $this->NT_UPDATED_ON);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
    if (!empty($this->NT_PUB_DATE )) 
        {

       $this->NT_PUB_DATE = strtotime( $this->NT_PUB_DATE);
            
        
    }
    if (!empty($this->NT_EXP_DATE) )
    {
        $this->NT_EXP_DATE = strtotime(  $this->NT_EXP_DATE);
    }
    return parent::beforeSave();
}
public function afterFind()
        {
                 if (!empty($this->NT_PUB_DATE )) {    
                         $this->NT_PUB_DATE=date('m/d/Y', $this->NT_PUB_DATE);
                }
                if (!empty($this->NT_EXP_DATE )) {    
                         $this->NT_EXP_DATE=date('m/d/Y', $this->NT_EXP_DATE);
                }
                parent::afterFind();
        }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NOTICENOTICE the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
