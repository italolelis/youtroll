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
 * @property string $obct_fk_owner
 * @property string $pbct_fk_comic_categories
 *
 * The followings are the available model relations:
 * @property ChannelSections $pbctChannelSection
 * @property ComicCategories $pbctFkComicCategories
 * @property Users $obctFkOwner
 * @property PublicationsTags[] $publicationsTags
 * @property PublicationsTags[] $publicationsTags1
 */
class Publication extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Publication the static model class
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
            array('pbct_image_id, pbct_channel_section_id, pbct_title, pbct_description, pbct_record, pbct_image_path, obct_fk_owner, pbct_fk_comic_categories', 'required'),
            array('pbct_image_id, pbct_channel_section_id, obct_fk_owner', 'length', 'max' => 20),
            array('pbct_title', 'length', 'max' => 100),
            array('pbct_description', 'length', 'max' => 256),
            array('pbct_image_path', 'length', 'max' => 128),
            array('pbct_fk_comic_categories', 'length', 'max' => 1),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('pbct_image_id, pbct_channel_section_id, pbct_title, pbct_description, pbct_record, pbct_image_path, obct_fk_owner, pbct_fk_comic_categories', 'safe', 'on' => 'search'),
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
            'pbctChannelSection' => array(self::BELONGS_TO, 'ChannelSections', 'pbct_channel_section_id'),
            'pbctFkComicCategories' => array(self::BELONGS_TO, 'ComicCategories', 'pbct_fk_comic_categories'),
            'obctFkOwner' => array(self::BELONGS_TO, 'Users', 'obct_fk_owner'),
            'publicationsTags' => array(self::HAS_MANY, 'PublicationsTags', 'pbct_tag_fk_image'),
            'publicationsTags1' => array(self::HAS_MANY, 'PublicationsTags', 'pbct_tag_fk_channel_section'),
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
            'obct_fk_owner' => 'Obct Fk Owner',
            'pbct_fk_comic_categories' => 'Pbct Fk Comic Categories',
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
        $criteria->compare('obct_fk_owner', $this->obct_fk_owner, true);
        $criteria->compare('pbct_fk_comic_categories', $this->pbct_fk_comic_categories, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}