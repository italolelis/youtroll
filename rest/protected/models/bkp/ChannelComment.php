<?php

/**
 * This is the model class for table "tb_channel_comments".
 *
 * The followings are the available columns in table 'tb_channel_comments':
 * @property string $chnl_cmnt_id
 * @property string $chnl_cmnt_text
 * @property string $chnl_cmnt_fk_channel
 * @property string $chnl_cmnt_fk_sender
 * @property integer $chnl_cmnt_status
 * @property string $chnl_cmnt_record
 *
 * The followings are the available model relations:
 * @property Channel $channel
 * @property User $userSender
 */
class ChannelComment extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ChannelComments the static model class
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
        return 'tb_channel_comments';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('chnl_cmnt_text, chnl_cmnt_fk_channel, chnl_cmnt_fk_sender, chnl_cmnt_record', 'required'),
            array('chnl_cmnt_status', 'numerical', 'integerOnly' => true),
            array('chnl_cmnt_text', 'length', 'max' => 512),
            array('chnl_cmnt_fk_channel, chnl_cmnt_fk_sender', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('chnl_cmnt_id, chnl_cmnt_text, chnl_cmnt_fk_channel, chnl_cmnt_fk_sender, chnl_cmnt_status, chnl_cmnt_record', 'safe', 'on' => 'search'),
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
            'channel' => array(self::BELONGS_TO, 'Channel', 'chnl_cmnt_fk_channel'),
            'userSender' => array(self::BELONGS_TO, 'User', 'chnl_cmnt_fk_sender'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'chnl_cmnt_id' => 'Chnl Cmnt',
            'chnl_cmnt_text' => 'Chnl Cmnt Text',
            'chnl_cmnt_fk_channel' => 'Chnl Cmnt Fk Channel',
            'chnl_cmnt_fk_sender' => 'Chnl Cmnt Fk Sender',
            'chnl_cmnt_status' => 'Chnl Cmnt Status',
            'chnl_cmnt_record' => 'Chnl Cmnt Record',
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

        $criteria->compare('chnl_cmnt_id', $this->chnl_cmnt_id, true);
        $criteria->compare('chnl_cmnt_text', $this->chnl_cmnt_text, true);
        $criteria->compare('chnl_cmnt_fk_channel', $this->chnl_cmnt_fk_channel, true);
        $criteria->compare('chnl_cmnt_fk_sender', $this->chnl_cmnt_fk_sender, true);
        $criteria->compare('chnl_cmnt_status', $this->chnl_cmnt_status);
        $criteria->compare('chnl_cmnt_record', $this->chnl_cmnt_record, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}