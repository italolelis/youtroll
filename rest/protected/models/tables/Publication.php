<?php

/**
 * This is the model class for table "tb_publications".
 *
 * The followings are the available columns in table 'tb_publications':
 * @property string $pbct_image_id
 * @property string $pbct_channel_section_id
 * @property string $pbct_title
 * @property string $pbct_description
 * @property string $pbct_record
 * @property string $pbct_image_path
 * @property string $pbct_fk_owner
 * @property integer $pbct_fk_categorie
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property Categorie $categorie
 * @property ChannelSection $channelSection
 * @property Tag[] $tags
 */
class Publication extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Publications the static model class
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
            array('pbct_image_id, pbct_channel_section_id, pbct_title, pbct_description, pbct_record, pbct_image_path, pbct_fk_owner, pbct_fk_categorie', 'required'),
            array('pbct_fk_categorie', 'numerical', 'integerOnly' => true),
            array('pbct_image_id, pbct_channel_section_id, pbct_fk_owner', 'length', 'max' => 20),
            array('pbct_title', 'length', 'max' => 100),
            array('pbct_description', 'length', 'max' => 256),
            array('pbct_image_path', 'length', 'max' => 128),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('pbct_image_id, pbct_channel_section_id, pbct_title, pbct_description, pbct_record, pbct_image_path, pbct_fk_owner, pbct_fk_categorie', 'safe', 'on' => 'search'),
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
            'owner' => array(self::BELONGS_TO, 'Users', 'pbct_fk_owner'),
            'categorie' => array(self::BELONGS_TO, 'Categories', 'pbct_fk_categorie'),
            'channelSection' => array(self::BELONGS_TO, 'ChannelSections', 'pbct_channel_section_id'),
            'tags' => array(self::MANY_MANY, 'Tag', 'tb_publication_tags(pbct_tag_fk_image, pbct_tag_fk_channel_section)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'pbct_image_id' => 'Pbct Image',
            'pbct_channel_section_id' => 'Pbct Channel Section',
            'pbct_title' => 'Pbct Title',
            'pbct_description' => 'Pbct Description',
            'pbct_record' => 'Pbct Record',
            'pbct_image_path' => 'Pbct Image Path',
            'pbct_fk_owner' => 'Pbct Fk Owner',
            'pbct_fk_categorie' => 'Pbct Fk Categorie',
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

        $criteria->compare('pbct_image_id', $this->pbct_image_id, true);
        $criteria->compare('pbct_channel_section_id', $this->pbct_channel_section_id, true);
        $criteria->compare('pbct_title', $this->pbct_title, true);
        $criteria->compare('pbct_description', $this->pbct_description, true);
        $criteria->compare('pbct_record', $this->pbct_record, true);
        $criteria->compare('pbct_image_path', $this->pbct_image_path, true);
        $criteria->compare('pbct_fk_owner', $this->pbct_fk_owner, true);
        $criteria->compare('pbct_fk_categorie', $this->pbct_fk_categorie);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}