<?php

/**
 * This is the model class for table "tb_tags".
 *
 * The followings are the available columns in table 'tb_tags':
 * @property integer $tag_id
 * @property string $tag_name
 *
 * The followings are the available model relations:
 * @property PublicationTag[] $publicationTag
 */
class Tag extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Tags the static model class
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
        return 'tb_tags';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tag_name', 'required'),
            array('tag_name', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('tag_id, tag_name', 'safe', 'on' => 'search'),
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
            'publicationTag' => array(self::HAS_MANY, 'PublicationTag', 'pbct_tag_fk_tag'),
            'tags' => array(self::MANY_MANY, 'Tag', 'tb_publications(pbct_tag_fk_tag)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'tag_id' => 'Tag',
            'tag_name' => 'Tag Name',
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

        $criteria->compare('tag_id', $this->tag_id);
        $criteria->compare('tag_name', $this->tag_name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}