<?php

/**
 * This is the model class for table "tb_users".
 *
 * The followings are the available columns in table 'tb_users':
 * @property string $usr_id
 * @property string $usr_username
 * @property string $usr_email
 * @property string $usr_password
 * @property string $usr_birthday
 * @property string $usr_gender
 * @property string $usr_bio
 * @property string $usr_site
 * @property string $usr_locale
 * @property string $usr_record
 * @property integer $usr_active
 * @property integer $usr_excluded
 * @property integer $usr_blocked
 * @property integer $usr_recover_password
 * @property string $usr_profile_path
 * @property string $usr_fk_user_type
 *
 * The followings are the available model relations:
 * @property ChannelComments[] $channelComments
 * @property Channels[] $channels
 * @property Channels[] $tbChannels
 * @property Publications[] $publications
 * @property UserTypes $usrFkUserType
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
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
			array('usr_username, usr_email, usr_password, usr_record', 'required'),
			array('usr_active, usr_excluded, usr_blocked, usr_recover_password', 'numerical', 'integerOnly'=>true),
			array('usr_username', 'length', 'max'=>25),
			array('usr_email', 'length', 'max'=>50),
			array('usr_password, usr_profile_path', 'length', 'max'=>128),
			array('usr_gender, usr_fk_user_type', 'length', 'max'=>1),
			array('usr_bio', 'length', 'max'=>512),
			array('usr_site', 'length', 'max'=>255),
			array('usr_locale', 'length', 'max'=>5),
			array('usr_birthday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usr_id, usr_username, usr_email, usr_password, usr_birthday, usr_gender, usr_bio, usr_site, usr_locale, usr_record, usr_active, usr_excluded, usr_blocked, usr_recover_password, usr_profile_path, usr_fk_user_type', 'safe', 'on'=>'search'),
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
			'channelComments' => array(self::HAS_MANY, 'ChannelComments', 'chnl_cmnt_fk_sender'),
			'channels' => array(self::HAS_MANY, 'Channels', 'chnl_fk_owner'),
			'tbChannels' => array(self::MANY_MANY, 'Channels', 'tb_inscriptions(insc_fk_user, insc_fk_channel)'),
			'publications' => array(self::HAS_MANY, 'Publications', 'obct_fk_owner'),
			'usrFkUserType' => array(self::BELONGS_TO, 'UserTypes', 'usr_fk_user_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usr_id' => 'Usr',
			'usr_username' => 'Usr Username',
			'usr_email' => 'Usr Email',
			'usr_password' => 'Usr Password',
			'usr_birthday' => 'Usr Birthday',
			'usr_gender' => 'Usr Gender',
			'usr_bio' => 'Usr Bio',
			'usr_site' => 'Usr Site',
			'usr_locale' => 'Usr Locale',
			'usr_record' => 'Usr Record',
			'usr_active' => 'Usr Active',
			'usr_excluded' => 'Usr Excluded',
			'usr_blocked' => 'Usr Blocked',
			'usr_recover_password' => 'Usr Recover Password',
			'usr_profile_path' => 'Usr Profile Path',
			'usr_fk_user_type' => 'Usr Fk User Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('usr_id',$this->usr_id,true);
		$criteria->compare('usr_username',$this->usr_username,true);
		$criteria->compare('usr_email',$this->usr_email,true);
		$criteria->compare('usr_password',$this->usr_password,true);
		$criteria->compare('usr_birthday',$this->usr_birthday,true);
		$criteria->compare('usr_gender',$this->usr_gender,true);
		$criteria->compare('usr_bio',$this->usr_bio,true);
		$criteria->compare('usr_site',$this->usr_site,true);
		$criteria->compare('usr_locale',$this->usr_locale,true);
		$criteria->compare('usr_record',$this->usr_record,true);
		$criteria->compare('usr_active',$this->usr_active);
		$criteria->compare('usr_excluded',$this->usr_excluded);
		$criteria->compare('usr_blocked',$this->usr_blocked);
		$criteria->compare('usr_recover_password',$this->usr_recover_password);
		$criteria->compare('usr_profile_path',$this->usr_profile_path,true);
		$criteria->compare('usr_fk_user_type',$this->usr_fk_user_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}