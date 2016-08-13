<?php

/**
 * This is the model class for table "CEP_FIRM".
 *
 * The followings are the available columns in table 'CEP_FIRM':
 * @property double $CF_ID
 * @property string $CF_TYPE
 * @property string $CF_NAME
 * @property string $CF_ADDRESS
 * @property string $CF_COUNTRY
 * @property string $CF_STATE
 * @property string $CF_CITY
 * @property integer $CF_PIN
 *
 * The followings are the available model relations:
 * @property CEPINTIMATION[] $cEPINTIMATIONs
 */
class CEPFIRM extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'CEP_FIRM';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CF_TYPE, CF_NAME, CF_COUNTRY, CF_STATE', 'required'),
            array('CF_PIN', 'numerical', 'integerOnly' => true),
            array('CF_TYPE, CF_COUNTRY, CF_STATE, CF_CITY', 'length', 'max' => 100),
            array('CF_NAME', 'length', 'max' => 200),
            array('CF_ADDRESS', 'length', 'max' => 300),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('CF_ID, CF_TYPE, CF_NAME, CF_ADDRESS, CF_COUNTRY, CF_STATE, CF_CITY, CF_PIN', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cEPINTIMATIONs' => array(self::HAS_MANY, 'CEPINTIMATION', 'CI_CF_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'CF_ID' => 'Firm Id',
            'CF_TYPE' => 'Type',
            'CF_NAME' => 'Firm Name',
            'CF_ADDRESS' => 'Firm Address',
            'CF_COUNTRY' => 'Firm Country',
            'CF_STATE' => 'Firm State',
            'CF_CITY' => 'Firm City',
            'CF_PIN' => 'Firm PIN',
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

        $criteria->compare('CF_ID', $this->CF_ID);
        $criteria->compare('CF_TYPE', $this->CF_TYPE, true);
        $criteria->compare('CF_NAME', $this->CF_NAME, true);
        $criteria->compare('CF_ADDRESS', $this->CF_ADDRESS, true);
        $criteria->compare('CF_COUNTRY', $this->CF_COUNTRY, true);
        $criteria->compare('CF_STATE', $this->CF_STATE, true);
        $criteria->compare('CF_CITY', $this->CF_CITY, true);
        $criteria->compare('CF_PIN', $this->CF_PIN);

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

    public function getFirmList() {

        $data1 = array();
        $models = CEPFIRM::model()->findAll(array('order' => 'CF_NAME ASC'));

        foreach ($models as $value) {
            $data1[$value->CF_ID] = $value->CF_NAME . ' (' . $value->CF_ADDRESS . ' )';
        }
        $data1['other'] = 'other';
        return $data1;
    }

    public function getFirmType() {
        return array(
            'Private' => 'Private',
            'Academic/Educational' => 'Academic/Educational',
            'Semi-Govt' => 'Semi-Govt',
            'Govt' => "Govt",
            'Public Sector' => 'Public Sector',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CEPFIRM the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getState() {
        return array(
            'Andaman And Nicobar' => 'Andaman And Nicobar',
            'Andhra Pradesh' => 'Andhra Pradesh',
            'Arunachal Pradesh' => 'Arunachal Pradesh',
            'Assam' => 'Assam',
            'Bihar' => 'Bihar',
            'Chandigarh' => 'Chandigarh',
            'Chhattisgarh' => 'Chhattisgarh',
            'Dadra And Nagar Haveli' => 'Dadra And Nagar Haveli',
            'Daman And Diu' => 'Daman And Diu',
            'Goa' => 'Goa',
            'Gujarat' => 'Gujarat',
            'Haryana' => 'Haryana',
            'Himachal Pradesh' => 'Himachal Pradesh',
            'Jammu And Kashmir' => 'Jammu And Kashmir',
            'Jharkhand' => 'Jharkhand',
            'Karnataka' => 'Karnataka',
            'Kerala' => 'Kerala',
            'Lakshadweep' => 'Lakshadweep',
            'Madhya Pradesh' => 'Madhya Pradesh',
            'Maharashtra' => 'Maharashtra',
            'Manipur' => 'Manipur',
            'Meghalaya' => 'Meghalaya',
            'Mizoram' => 'Mizoram',
            'Nagaland' => 'Nagaland',
            'New Delhi' => 'New Delhi',
            'Orissa' => 'Orissa',
            'Pondicherry' => 'Pondicherry',
            'Punjab' => 'Punjab',
            'Rajasthan' => 'Rajasthan',
            'Sikkim' => 'Sikkim',
            'Tamil Nadu' => 'Tamil Nadu',
            'Telangana' => 'Telangana',
            'Tripura' => 'Tripura',
            'Uttar Pradesh' => 'Uttar Pradesh',
            'Uttrakhand' => 'Uttrakhand',
            'West Bengal' => 'West Bengal',
        );
    }

    public function getCountry() {
        return array(
            'India' => 'India',
            'Afghanistan' => 'Afghanistan',
            'Albania' => 'Albania',
            'Algeria' => 'Algeria',
            'Andorra' => 'Andorra',
            'Angola' => 'Angola',
            'Antigua and Barbuda' => 'Antigua and Barbuda',
            'Argentina' => 'Argentina',
            'Armenia' => 'Armenia',
            'Australia' => 'Australia',
            'Austria' => 'Austria',
            'Azerbaijan' => 'Azerbaijan',
            'Bahamas' => 'Bahamas',
            'Bahrain' => 'Bahrain',
            'Bangladesh' => 'Bangladesh',
            'Barbados' => 'Barbados',
            'Belarus' => 'Belarus',
            'Belgium' => 'Belgium',
            'Belize' => 'Belize',
            'Benin' => 'Benin',
            'Bhutan' => 'Bhutan',
            'Bolivia' => 'Bolivia',
            'Botswana' => 'Botswana',
            'Brazil' => 'Brazil',
            'Brunei Darussalam' => 'Brunei Darussalam',
            'Bulgaria' => 'Bulgaria',
            'Burkina Faso' => 'Burkina Faso',
            'Burundi' => 'Burundi',
            'Cabo Verde' => 'Cabo Verde',
            'Cambodia' => 'Cambodia',
            'Cameroon' => 'Cameroon',
            'Canada' => 'Canada',
            'Central African Republic' => 'Central African Republic',
            'Chad' => 'Chad',
            'Chile' => 'Chile',
            'China' => 'China',
            'Colombia' => 'Colombia',
            'Comoros' => 'Comoros',
            'Congo' => 'Congo',
            'Costa Rica' => 'Costa Rica',
            'Côte dIvoire' => 'Côte dIvoire',
            'Croatia' => 'Croatia',
            'Cuba' => 'Cuba',
            'Cyprus' => 'Cyprus',
            'Czech Republic' => 'Czech Republic',
            'Republic of Korea ' => 'Republic of Korea',
            'Democratic Republic of the Cong' => 'Democratic Republic of the Cong',
            'Denmark' => 'Denmark',
            'Djibouti' => 'Djibouti',
            'Dominica' => 'Dominica',
            'Dominican Republic' => 'Dominican Republic',
            'Ecuador' => 'Ecuador',
            'Egypt' => 'Egypt',
            'El Salvador' => 'El Salvador',
            'Equatorial Guinea' => 'Equatorial Guinea',
            'Eritrea' => 'Eritrea',
            'Estonia' => 'Estonia',
            'Ethiopia' => 'Ethiopia',
            'Fiji' => 'Fiji',
            'Finland' => 'Finland',
            'France' => 'France',
            'Gabon' => 'Gabon',
            'Gambia' => 'Gambia',
            'Georgia' => 'Georgia',
            'Germany' => 'Germany',
            'Ghana' => 'Ghana',
            'Greece' => 'Greece',
            'Grenada' => 'Grenada',
            'Guatemala' => 'Guatemala',
            'Guinea' => 'Guinea',
            'Guinea-Bissau' => 'Guinea-Bissau',
            'Guyana' => 'Guyana',
            'Haiti' => 'Haiti',
            'Honduras' => 'Honduras',
            'Hungary' => 'Hungary',
            'Iceland' => 'Iceland',
            'Indonesia' => 'Indonesia',
            'Iran' => 'Iran',
            'Iraq' => 'Iraq',
            'Ireland' => 'Ireland',
            'Israel' => 'Israel',
            'Italy' => 'Italy',
            'Jamaica' => 'Jamaica',
            'Japan' => 'Japan',
            'Jordan' => 'Jordan',
            'Kazakhstan' => 'Kazakhstan',
            'Kenya' => 'Kenya',
            'Kiribati' => 'Kiribati',
            'Kuwait' => 'Kuwait',
            'Kyrgyzstan' => 'Kyrgyzstan',
            'Laos' => 'Laos',
            'Latvia' => 'Latvia',
            'Lebanon' => 'Lebanon',
            'Lesotho' => 'Lesotho',
            'Liberia' => 'Liberia',
            'Libya' => 'Libya',
            'Liechtenstein' => 'Liechtenstein',
            'Lithuania' => 'Lithuania',
            'Luxembourg' => 'Luxembourg',
            'Macedonia' => 'Macedonia',
            'Madagascar' => 'Madagascar',
            'Malawi' => 'Malawi',
            'Malaysia' => 'Malaysia',
            'Maldives' => 'Maldives',
            'Mali' => 'Mali',
            'Malta' => 'Malta',
            'Marshall Islands' => 'Marshall Islands',
            'Mauritania' => 'Mauritania',
            'Mauritius' => 'Mauritius',
            'Mexico' => 'Mexico',
            'Micronesia (Federated States of)' => 'Micronesia (Federated States of)',
            'Monaco' => 'Monaco',
            'Mongolia' => 'Mongolia',
            'Montenegro' => 'Montenegro',
            'Morocco' => 'Morocco',
            'Mozambique' => 'Mozambique',
            'Myanmar' => 'Myanmar',
            'Namibia' => 'Namibia',
            'Nauru' => 'Nauru',
            'Nepal' => 'Nepal',
            'Netherlands' => 'Netherlands',
            'New Zealand' => 'New Zealand',
            'Nicaragua' => 'Nicaragua',
            'Niger' => 'Niger',
            'Nigeria' => 'Nigeria',
            'Norway' => 'Norway',
            'Oman' => 'Oman',
            'Pakistan' => 'Pakistan',
            'Palau' => 'Palau',
            'Panama' => 'Panama',
            'Papua New Guinea' => 'Papua New Guinea',
            'Paraguay' => 'Paraguay',
            'Peru' => 'Peru',
            'Philippines' => 'Philippines',
            'Poland' => 'Poland',
            'Portugal' => 'Portugal',
            'Qatar' => 'Qatar',
            'Republic of Korea (South Korea)' => 'Republic of Korea (South Korea)',
            'Republic of Moldova' => 'Republic of Moldova',
            'Romania' => 'Romania',
            'Russian Federation' => 'Russian Federation',
            'Rwanda' => 'Rwanda',
            'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
            'Saint Lucia' => 'Saint Lucia',
            'Saint Vincent and the Grenadines' => 'Saint Vincent and the Grenadines',
            'Samoa' => 'Samoa',
            'San Marino' => 'San Marino',
            'Sao Tome and Principe' => 'Sao Tome and Principe',
            'Saudi Arabia' => 'Saudi Arabia',
            'Senegal' => 'Senegal',
            'Serbia' => 'Serbia',
            'Seychelles' => 'Seychelles',
            'Sierra Leone' => 'Sierra Leone',
            'Singapore' => 'Singapore',
            'Slovakia' => 'Slovakia',
            'Slovenia' => 'Slovenia',
            'Solomon Islands' => 'Solomon Islands',
            'Somalia' => 'Somalia',
            'South Africa' => 'South Africa',
            'South Sudan' => 'South Sudan',
            'Spain' => 'Spain',
            'Sri Lanka' => 'Sri Lanka',
            'Sudan' => 'Sudan',
            'Suriname' => 'Suriname',
            'Swaziland' => 'Swaziland',
            'Sweden' => 'Sweden',
            'Switzerland' => 'Switzerland',
            'Syrian Arab Republic' => 'Syrian Arab Republic',
            'Tajikistan' => 'Tajikistan',
            'Thailand' => 'Thailand',
            'Timor-Leste' => 'Timor-Leste',
            'Togo' => 'Togo',
            'Tonga' => 'Tonga',
            'Trinidad and Tobago' => 'Trinidad and Tobago',
            'Tunisia' => 'Tunisia',
            'Turkey' => 'Turkey',
            'Turkmenistan' => 'Turkmenistan',
            'Tuvalu' => 'Tuvalu',
            'Uganda' => 'Uganda',
            'Ukraine' => 'Ukraine',
            'United Arab Emirates' => 'United Arab Emirates',
            'United Kingdom of Great Britain and Northern Ireland' => 'United Kingdom of Great Britain and Northern Ireland',
            'United Republic of Tanzania' => 'United Republic of Tanzania',
            'United States of America' => 'United States of America',
            'Uruguay' => 'Uruguay',
            'Uzbekistan' => 'Uzbekistan',
            'Vanuatu' => 'Vanuatu',
            'Venezuela' => 'Venezuela',
            'Vietnam' => 'Vietnam',
            'Yemen' => 'Yemen',
            'Zambia' => 'Zambia',
            'Zimbabwe' => 'Zimbabwe',
        );
    }

}
