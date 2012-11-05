<?php

/**
 * This is the model class for table "tb_publications".
 *
 * The followings are the available columns in table 'tb_publications':
 * @property string $pbct_id
 * @property string $pbct_title
 * @property string $pbct_description
 * @property string $pbct_record
 * @property string $pbct_image_path
 * @property integer $pbct_hits
 * @property integer $pbct_fake_hits
 * @property string $pbct_fk_owner
 * @property integer $pbct_fk_category
 * @property string $pbct_fk_channel
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Channel $channel
 * @property User $owner
 * @property PublicationComment[] $publicationComments
 * @property Tag[] $tags
 * @property User[] $reviewers
 */
class Publication extends Table
{
    protected $attributesPrefix = 'pbct_';
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Publications the static model class
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
        return 'tb_publications';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pbct_title, pbct_description, pbct_image_path, pbct_hits, pbct_fake_hits, pbct_fk_owner, pbct_fk_category, pbct_fk_channel', 'required'),
            array('pbct_like, pbct_unlike, pbct_hits, pbct_fake_hits, pbct_fk_category', 'numerical', 'integerOnly'=>true),
            array('pbct_title', 'length', 'max'=>100),
            array('pbct_description', 'length', 'max'=>256),
            array('pbct_image_path', 'length', 'max'=>128),
            array('pbct_fk_owner, pbct_fk_channel', 'length', 'max'=>20),
            array('pbct_record', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('pbct_id, pbct_title, pbct_description, pbct_record, pbct_image_path, pbct_hits, pbct_fake_hits, pbct_fk_owner, pbct_fk_category, pbct_fk_channel', 'safe', 'on'=>'search'),
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
            'category' => array(self::BELONGS_TO, 'Category', 'pbct_fk_category'),
            'channel' => array(self::BELONGS_TO, 'Channel', 'pbct_fk_channel'),
            'owner' => array(self::BELONGS_TO, 'User', 'pbct_fk_owner'),
            'publicationComments' => array(self::HAS_MANY, 'PublicationComment', 'pbct_cmnt_fk_publication'),
            'tags' => array(self::MANY_MANY, 'Tag', 'tb_publications_tags(pbct_tag_fk_publication, pbct_tag_fk_tag)'),
            'reviewers' => array(self::MANY_MANY, 'User', 'tb_reviews_users(rvw_usr_fk_publication, rvw_usr_fk_user)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'pbct_id' => 'Pbct',
            'pbct_title' => 'Pbct Title',
            'pbct_description' => 'Pbct Description',
            'pbct_record' => 'Pbct Record',
            'pbct_image_path' => 'Pbct Image Path',
            'pbct_hits' => 'Pbct Hits',
            'pbct_fake_hits' => 'Pbct Fake Hits',
            'pbct_fk_owner' => 'Pbct Fk Owner',
            'pbct_fk_category' => 'Pbct Fk Category',
            'pbct_fk_channel' => 'Pbct Fk Channel',
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

        $criteria->compare('pbct_id',$this->pbct_id,true);
        $criteria->compare('pbct_title',$this->pbct_title,true);
        $criteria->compare('pbct_description',$this->pbct_description,true);
        $criteria->compare('pbct_record',$this->pbct_record,true);
        $criteria->compare('pbct_image_path',$this->pbct_image_path,true);
        $criteria->compare('pbct_hits',$this->pbct_hits);
        $criteria->compare('pbct_fake_hits',$this->pbct_fake_hits);
        $criteria->compare('pbct_fk_owner',$this->pbct_fk_owner,true);
        $criteria->compare('pbct_fk_category',$this->pbct_fk_category);
        $criteria->compare('pbct_fk_channel',$this->pbct_fk_channel,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}