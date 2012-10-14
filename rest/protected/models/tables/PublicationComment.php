<?php

/**
 * This is the model class for table "tb_publications_comments".
 *
 * The followings are the available columns in table 'tb_publications_comments':
 * @property string $pbct_cmnt_id
 * @property string $pbct_cmnt_text
 * @property string $pbct_cmnt_fk_publication
 * @property string $pbct_cmnt_fk_sender
 * @property integer $pbct_cmnt_status
 * @property string $pbct_cmnt_record
 *
 * The followings are the available model relations:
 * @property Publication $publication
 * @property User $userSender
 */
class PublicationComment extends CActiveRecord
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
        return 'tb_publications_comments';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pbct_cmnt_text, pbct_cmnt_fk_channel, pbct_cmnt_fk_sender', 'required'),
            array('pbct_cmnt_status', 'numerical', 'integerOnly' => true),
            array('pbct_cmnt_text', 'length', 'max' => 512),
            array('pbct_cmnt_fk_channel, pbct_cmnt_fk_sender', 'length', 'max' => 20),
            array('pbct_cmnt_record', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('pbct_cmnt_id, pbct_cmnt_text, pbct_cmnt_fk_channel, pbct_cmnt_fk_sender, pbct_cmnt_status, pbct_cmnt_record', 'safe', 'on' => 'search'),
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
            'publication' => array(self::BELONGS_TO, 'Publication', 'pbct_cmnt_fk_publication'),
            'userSender' => array(self::BELONGS_TO, 'User', 'pbct_cmnt_fk_sender'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'pbct_cmnt_id' => 'Chnl Cmnt',
            'pbct_cmnt_text' => 'Chnl Cmnt Text',
            'pbct_cmnt_fk_publication' => 'Chnl Cmnt Fk Channel',
            'pbct_cmnt_fk_sender' => 'Chnl Cmnt Fk Sender',
            'pbct_cmnt_status' => 'Chnl Cmnt Status',
            'pbct_cmnt_record' => 'Chnl Cmnt Record',
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

        $criteria->compare('pbct_cmnt_id', $this->pbct_cmnt_id, true);
        $criteria->compare('pbct_cmnt_text', $this->pbct_cmnt_text, true);
        $criteria->compare('pbct_cmnt_fk_publication', $this->pbct_cmnt_fk_publication, true);
        $criteria->compare('pbct_cmnt_fk_sender', $this->pbct_cmnt_fk_sender, true);
        $criteria->compare('pbct_cmnt_status', $this->pbct_cmnt_status);
        $criteria->compare('pbct_cmnt_record', $this->pbct_cmnt_record, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}