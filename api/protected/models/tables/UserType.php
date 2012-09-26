<?php

/**
 * This is the model class for table "tb_user_types".
 *
 * The followings are the available columns in table 'tb_user_types':
 * @property string $usr_tp_id
 * @property string $usr_tp_description
 *
 * The followings are the available model relations:
 * @property Users[] $users
 */
class UserType extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserType the static model class
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
        return 'tb_user_types';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('usr_tp_id, usr_tp_description', 'required'),
            array('usr_tp_id', 'length', 'max' => 1),
            array('usr_tp_description', 'length', 'max' => 25),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('usr_tp_id, usr_tp_description', 'safe', 'on' => 'search'),
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
            'users' => array(self::HAS_MANY, 'Users', 'usr_fk_user_type'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'usr_tp_id' => 'Usr Tp',
            'usr_tp_description' => 'Usr Tp Description',
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

        $criteria->compare('usr_tp_id', $this->usr_tp_id, true);
        $criteria->compare('usr_tp_description', $this->usr_tp_description, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}