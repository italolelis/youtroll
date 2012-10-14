<?php

/**
 * This is the model class for table "tb_channels".
 *
 * The followings are the available columns in table 'tb_channels':
 * @property string $chnl_id
 * @property string $chnl_fk_owner
 * @property string $chnl_name
 * @property string $chnl_record
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property User[] $users
 * @property Publication[] $publications
 */
class Channels extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Channels the static model class
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
        return 'tb_channels';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('chnl_fk_owner, chnl_name', 'required'),
            array('chnl_fk_owner', 'length', 'max' => 20),
            array('chnl_name', 'length', 'max' => 50),
            array('chnl_record', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('chnl_id, chnl_fk_owner, chnl_name, chnl_record', 'safe', 'on' => 'search'),
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
            'owner' => array(self::BELONGS_TO, 'User', 'chnl_fk_owner'),
            'followers' => array(self::MANY_MANY, 'User', 'tb_inscriptions(insc_fk_channel, insc_fk_user)'),
            'publications' => array(self::HAS_MANY, 'Publication', 'pbct_fk_channel'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'chnl_id' => 'Chnl',
            'chnl_fk_owner' => 'Chnl Fk Owner',
            'chnl_name' => 'Chnl Name',
            'chnl_record' => 'Chnl Record',
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

        $criteria->compare('chnl_id', $this->chnl_id, true);
        $criteria->compare('chnl_fk_owner', $this->chnl_fk_owner, true);
        $criteria->compare('chnl_name', $this->chnl_name, true);
        $criteria->compare('chnl_record', $this->chnl_record, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}