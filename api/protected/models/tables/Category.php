<?php

/**
 * This is the model class for table "tb_comic_categories".
 *
 * The followings are the available columns in table 'tb_comic_categories':
 * @property string $cmc_ctg_id
 * @property string $cmc_ctg_description
 *
 * The followings are the available model relations:
 * @property Publications[] $publications
 */
class Category extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ComicCategorie the static model class
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
        return 'tb_comic_categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cmc_ctg_id, cmc_ctg_description', 'required'),
            array('cmc_ctg_id', 'length', 'max' => 1),
            array('cmc_ctg_description', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('cmc_ctg_id, cmc_ctg_description', 'safe', 'on' => 'search'),
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
            'publications' => array(self::HAS_MANY, 'Publications', 'pbct_fk_comic_categories'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'cmc_ctg_id' => 'Cmc Ctg',
            'cmc_ctg_description' => 'Cmc Ctg Description',
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

        $criteria->compare('cmc_ctg_id', $this->cmc_ctg_id, true);
        $criteria->compare('cmc_ctg_description', $this->cmc_ctg_description, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}