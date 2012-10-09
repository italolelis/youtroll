<?php

/**
 * This is the model class for table "tb_publications_tags".
 *
 * The followings are the available columns in table 'tb_publications_tags':
 * @property string $pbct_tag_fk_image
 * @property string $pbct_tag_fk_channel_section
 * @property integer $pbct_tag_fk_tag
 *
 * The followings are the available model relations:
 * @property Publication $publication
 * @property Tag $tag
 */
class PublicationsTag extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PublicationsTags the static model class
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
        return 'tb_publications_tags';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pbct_tag_fk_image, pbct_tag_fk_channel_section, pbct_tag_fk_tag', 'required'),
            array('pbct_tag_fk_tag', 'numerical', 'integerOnly' => true),
            array('pbct_tag_fk_image, pbct_tag_fk_channel_section', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('pbct_tag_fk_image, pbct_tag_fk_channel_section, pbct_tag_fk_tag', 'safe', 'on' => 'search'),
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
            'publication' => array(self::HAS_ONE, 'Publication', 'tb_publications(pbct_tag_fk_image, pbct_tag_fk_channel_section)'),
            'tag' => array(self::BELONGS_TO, 'Tag', 'pbct_tag_fk_tag'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'pbct_tag_fk_image' => 'Pbct Tag Fk Image',
            'pbct_tag_fk_channel_section' => 'Pbct Tag Fk Channel Section',
            'pbct_tag_fk_tag' => 'Pbct Tag Fk Tag',
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

        $criteria->compare('pbct_tag_fk_image', $this->pbct_tag_fk_image, true);
        $criteria->compare('pbct_tag_fk_channel_section', $this->pbct_tag_fk_channel_section, true);
        $criteria->compare('pbct_tag_fk_tag', $this->pbct_tag_fk_tag);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}