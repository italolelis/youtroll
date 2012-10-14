<?php

/**
 * This is the model class for table "tb_categories".
 *
 * The followings are the available columns in table 'tb_categories':
 * @property integer $ctg_id
 * @property string $ctg_name
 *
 * The followings are the available model relations:
 * @property Publication[] $publications
 */
class Category extends Table
{

    protected $attributesPrefix = 'ctg_';
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Categories the static model class
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
        return 'tb_categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ctg_name', 'required'),
            array('ctg_name', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ctg_id, ctg_name', 'safe', 'on' => 'search'),
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
            'publications' => array(self::HAS_MANY, 'Publication', 'pbct_fk_category'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ctg_id' => 'Ctg',
            'ctg_name' => 'Ctg Name',
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

        $criteria->compare('ctg_id', $this->ctg_id);
        $criteria->compare('ctg_name', $this->ctg_name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}