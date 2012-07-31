<?php

/**
 * This is the model class for table "{{sort}}".
 *
 * The followings are the available columns in table '{{sort}}':
 * @property integer $sid
 * @property string $sortname
 * @property string $alias
 * @property integer $taxis
 */
class BlogCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlogCategory the static model class
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
		return '{{sort}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('taxis', 'numerical', 'integerOnly'=>true),
			array('sortname', 'length', 'max'=>255),
			array('alias', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('sid, sortname, alias, taxis', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sid' => '序号',
			'sortname' => '名称',
			'alias' => '别名',
			'taxis' => '排序',
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

		/*$criteria->compare('sid',$this->sid);
		$criteria->compare('sortname',$this->sortname,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('taxis',$this->taxis);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}