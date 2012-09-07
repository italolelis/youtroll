<?php

/**
 * This is the model class for table "tb_channel_sections".
 *
 * The followings are the available columns in table 'tb_channel_sections':
 * @property string $chnl_sct_id
 * @property string $chnl_sct_name
 * @property string $chnl_sct_description
 * @property string $chnl_sct_fk_channel
 * @property string $chnl_sct_record
 *
 * The followings are the available model relations:
 * @property Channels $chnlSctFkChannel
 * @property Publications[] $publications
 */
class ChannelSection extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChannelSection the static model class
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
		return 'tb_channel_sections';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('chnl_sct_name, chnl_sct_description, chnl_sct_fk_channel, chnl_sct_record', 'required'),
			array('chnl_sct_name', 'length', 'max'=>50),
			array('chnl_sct_description', 'length', 'max'=>512),
			array('chnl_sct_fk_channel', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('chnl_sct_id, chnl_sct_name, chnl_sct_description, chnl_sct_fk_channel, chnl_sct_record', 'safe', 'on'=>'search'),
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
			'chnlSctFkChannel' => array(self::BELONGS_TO, 'Channels', 'chnl_sct_fk_channel'),
			'publications' => array(self::HAS_MANY, 'Publications', 'pbct_channel_section_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'chnl_sct_id' => 'Chnl Sct',
			'chnl_sct_name' => 'Chnl Sct Name',
			'chnl_sct_description' => 'Chnl Sct Description',
			'chnl_sct_fk_channel' => 'Chnl Sct Fk Channel',
			'chnl_sct_record' => 'Chnl Sct Record',
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

		$criteria->compare('chnl_sct_id',$this->chnl_sct_id,true);
		$criteria->compare('chnl_sct_name',$this->chnl_sct_name,true);
		$criteria->compare('chnl_sct_description',$this->chnl_sct_description,true);
		$criteria->compare('chnl_sct_fk_channel',$this->chnl_sct_fk_channel,true);
		$criteria->compare('chnl_sct_record',$this->chnl_sct_record,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}