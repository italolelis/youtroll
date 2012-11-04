<?php

Yii::import('ext.several.BCrypt');

/**
 * This is the model class for table "tb_users".
 *
 * The followings are the available columns in table 'tb_users':
 * @property string $usr_id
 * @property string $usr_name
 * @property string $usr_email
 * @property string $usr_password
 * @property string $usr_birthday
 * @property string $usr_gender
 * @property string $usr_bio
 * @property string $usr_site
 * @property string $usr_locale
 * @property string $usr_type
 * @property string $usr_record
 * @property integer $usr_status
 * @property string $usr_profile_path
 *
 * The followings are the available model relations:
 * @property Channel $channel
 * @property PublicationComment[] $commentedPublications
 * @property Channel[] $channelInscriptions
 * @property Publication[] $publications
 * @property Publication[] $publicationsViewed
 */
class User extends Table
{

    protected $attributesPrefix = 'usr_';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tb_users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('usr_email', 'required'),
            array('usr_status', 'numerical', 'integerOnly' => true),
            array('usr_name', 'length', 'min' => 3, 'max' => 100),
            array('usr_email', 'unique'),
            array('usr_email', 'length', 'min' => 5, 'max' => 50),
            array('usr_password, usr_profile_path', 'length', 'max' => 128),
            array('usr_gender, usr_type', 'length', 'is' => 1),
            array('usr_bio', 'length', 'max' => 512),
            array('usr_site', 'length', 'max' => 255),
            array('usr_locale', 'length', 'max' => 5),
            array('usr_birthday', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('usr_id, usr_name, usr_email, usr_password, usr_birthday, usr_gender, usr_bio, usr_site, usr_locale, usr_type, usr_record, usr_status, usr_profile_path', 'safe', 'on' => 'search'),
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
            'channel' => array(self::HAS_ONE, 'Channel', 'chnl_fk_owner'),
            'commentedPublications' => array(self::HAS_MANY, 'PublicationComment', 'pbct_cmnt_fk_sender'),
            'channelInscriptions' => array(self::MANY_MANY, 'Channel', 'tb_inscriptions(insc_fk_user, insc_fk_channel)'),
            'publications' => array(self::HAS_MANY, 'Publication', 'pbct_fk_owner'),
            'revisions' => array(self::MANY_MANY, 'Publication', 'tb_reviews_users(rvw_usr_fk_user, rvw_usr_fk_publication)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'usr_id' => 'Usr',
            'usr_name' => 'Usr Name',
            'usr_email' => 'Usr Email',
            'usr_password' => 'Usr Password',
            'usr_birthday' => 'Usr Birthday',
            'usr_gender' => 'Usr Gender',
            'usr_bio' => 'Usr Bio',
            'usr_site' => 'Usr Site',
            'usr_locale' => 'Usr Locale',
            'usr_type' => 'Usr Type',
            'usr_record' => 'Usr Record',
            'usr_status' => 'Usr Status',
            'usr_profile_path' => 'Usr Profile Path',
        );
    }

    public function beforeValidate()
    {
        $this->usr_password = BCrypt::hash($this->usr_password);
        return true;
    }
    
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('usr_id', $this->usr_id, true);
        $criteria->compare('usr_name', $this->usr_name, true);
        $criteria->compare('usr_email', $this->usr_email, true);
        $criteria->compare('usr_password', $this->usr_password, true);
        $criteria->compare('usr_birthday', $this->usr_birthday, true);
        $criteria->compare('usr_gender', $this->usr_gender, true);
        $criteria->compare('usr_bio', $this->usr_bio, true);
        $criteria->compare('usr_site', $this->usr_site, true);
        $criteria->compare('usr_locale', $this->usr_locale, true);
        $criteria->compare('usr_type', $this->usr_type, true);
        $criteria->compare('usr_record', $this->usr_record, true);
        $criteria->compare('usr_status', $this->usr_status);
        $criteria->compare('usr_profile_path', $this->usr_profile_path, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getUserByEmail($email)
    {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'LOWER(usr_email) = LOWER(:usr_email)',
            'params' => array(':usr_email' => $email),
        ));
        
        return $this;
    }

}