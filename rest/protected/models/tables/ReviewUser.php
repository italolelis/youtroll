
<?php

/**
 * This is the model class for table "tb_reviews_users".
 *
 * The followings are the available columns in table 'tb_reviews_users':
 * @property string $rvw_usr_fk_publication
 * @property string $rvw_usr_fk_user
 * @property integer $rvw_usr_like
 * 
 * The followings are the available model relations:
 * @property Publication $publication
 * @property User $user
 */
class ReviewUser extends Table
{

    protected $attributesPrefix = 'rvw_usr_';
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ReviewUser the static model class
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
        return 'tb_reviews_users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rvw_usr_fk_publication, rvw_usr_fk_user', 'required'),
            array('rvw_usr_like', 'numerical', 'integerOnly' => true),
            array('rvw_usr_fk_publication, rvw_usr_fk_user', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('rvw_usr_fk_publication, rvw_usr_fk_user, rvw_usr_like', 'safe', 'on' => 'search'),
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
            'publication' => array(self::BELONGS_TO, 'Publication', 'rvw_usr_fk_publication'),
            'user' => array(self::BELONGS_TO, 'User', 'rvw_usr_fk_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'rvw_usr_fk_publication' => 'Rvw Usr Fk Publication',
            'rvw_usr_fk_user' => 'Rvw Usr Fk User',
            'rvw_usr_like' => 'Rvw Usr Like',
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

        $criteria->compare('rvw_usr_fk_publication', $this->rvw_usr_fk_publication, true);
        $criteria->compare('rvw_usr_fk_user', $this->rvw_usr_fk_user, true);
        $criteria->compare('rvw_usr_like', $this->rvw_usr_like);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function getReviewUser($idUser, $idPublication)
    {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'rvw_usr_fk_publication = :rvw_usr_fk_publication AND rvw_usr_fk_user = :rvw_usr_fk_user',
            'params' => array(':rvw_usr_fk_publication' => $idPublication, ':rvw_usr_fk_user' => $idUser),
        ));
        
        return $this;
    }

}