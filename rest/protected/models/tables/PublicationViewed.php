<?php

/**
 * This is the model class for table "tb_publications_viewed".
 *
 * The followings are the available columns in table 'tb_publications_viewed':
 * @property string $pbct_vwd_fk_user
 * @property string $pbct_vwd_fk_publication
 * @property integer $pbct_vwd_like
 * @property integer $pbct_vwd_unlike
 * @property string $pbct_vwd_record
 * 
 * The followings are the available model relations:
 * @property Publication $publication
 * @property User $visitor
 */
class PublicationViewed extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PublicationsViewed the static model class
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
        return 'tb_publications_viewed';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pbct_vwd_fk_user, pbct_vwd_fk_publication', 'required'),
            array('pbct_vwd_like, pbct_vwd_unlike', 'numerical', 'integerOnly'=>true),
            array('pbct_vwd_fk_user, pbct_vwd_fk_publication', 'length', 'max'=>20),
            array('pbct_vwd_record', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('pbct_vwd_fk_user, pbct_vwd_fk_publication, pbct_vwd_like, pbct_vwd_unlike, pbct_vwd_record', 'safe', 'on'=>'search'),
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
            'publication' => array(self::BELONGS_TO, 'Publication', 'pbct_tag_fk_publication'),
            'visitor' => array(self::BELONGS_TO, 'User', 'pbct_vwd_fk_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'pbct_vwd_fk_user' => 'Pbct Vwd Fk User',
            'pbct_vwd_fk_publication' => 'Pbct Vwd Fk Publication',
            'pbct_vwd_like' => 'Pbct Vwd Like',
            'pbct_vwd_unlike' => 'Pbct Vwd Unlike',
            'pbct_vwd_record' => 'Pbct Vwd Record',
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

        $criteria->compare('pbct_vwd_fk_user',$this->pbct_vwd_fk_user,true);
        $criteria->compare('pbct_vwd_fk_publication',$this->pbct_vwd_fk_publication,true);
        $criteria->compare('pbct_vwd_like',$this->pbct_vwd_like);
        $criteria->compare('pbct_vwd_unlike',$this->pbct_vwd_unlike);
        $criteria->compare('pbct_vwd_record',$this->pbct_vwd_record,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}