<?php

/**
 * This is the model class for table "tb_inscriptions".
 *
 * The followings are the available columns in table 'tb_inscriptions':
 * @property string $insc_fk_channel
 * @property string $insc_fk_user
 * @property integer $insc_receive_email
 * @property string $insc_record
 * 
 * The followings are the available model relations:
 * @property Channel $channel
 * @property User $user
 */
class Inscription extends Table
{
    protected $attributesPrefix = 'insc_';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Inscriptions the static model class
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
        return 'tb_inscriptions';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('insc_fk_channel, insc_fk_user', 'required'),
            array('insc_receive_email', 'numerical', 'integerOnly' => true),
            array('insc_fk_channel, insc_fk_user', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('insc_fk_channel, insc_fk_user, insc_receive_email, insc_record', 'safe', 'on' => 'search'),
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
            'channel' => array(self::BELONGS_TO, 'Channel', 'insc_fk_channel'),
            'user' => array(self::BELONGS_TO, 'User', 'insc_fk_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'insc_fk_channel' => 'Insc Fk Channel',
            'insc_fk_user' => 'Insc Fk User',
            'insc_receive_email' => 'Insc Receive Email',
            'insc_record' => 'Insc Record',
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

        $criteria = new CDbCriteria;

        $criteria->compare('insc_fk_channel', $this->insc_fk_channel, true);
        $criteria->compare('insc_fk_user', $this->insc_fk_user, true);
        $criteria->compare('insc_receive_email', $this->insc_receive_email);
        $criteria->compare('insc_record', $this->insc_record, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function getInscription($idChannel, $idUser)
    {
        $this->getDbCriteria()->mergeWith(array(
            'with' => array('channel'),
            'condition' => 'insc_fk_channel = :insc_fk_channel AND insc_fk_user = :insc_fk_user AND channel.chnl_fk_owner <> :insc_fk_user',
            'params' => array(':insc_fk_channel' => $idChannel, ':insc_fk_user' => $idUser),
        ));
        
        return $this;
    }

}