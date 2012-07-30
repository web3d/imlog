<?php

/**
 * This is the model class for table "{{trackback}}".
 *
 * The followings are the available columns in table '{{trackback}}':
 * @property integer $tbid
 * @property integer $gid
 * @property string $title
 * @property string $date
 * @property string $excerpt
 * @property string $url
 * @property string $blog_name
 * @property string $ip
 */
class BlogTrackback extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlogTrackback the static model class
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
		return '{{trackback}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, excerpt', 'required'),
			array('gid', 'numerical', 'integerOnly'=>true),
			array('title, url, blog_name', 'length', 'max'=>255),
			array('date', 'length', 'max'=>20),
			array('ip', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tbid, gid, title, date, excerpt, url, blog_name, ip', 'safe', 'on'=>'search'),
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
			'tbid' => 'Tbid',
			'gid' => 'Gid',
			'title' => 'Title',
			'date' => 'Date',
			'excerpt' => 'Excerpt',
			'url' => 'Url',
			'blog_name' => 'Blog Name',
			'ip' => 'Ip',
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

		$criteria->compare('tbid',$this->tbid);
		$criteria->compare('gid',$this->gid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('blog_name',$this->blog_name,true);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}