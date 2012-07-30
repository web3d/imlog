<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $cid
 * @property integer $gid
 * @property integer $pid
 * @property string $date
 * @property string $poster
 * @property string $comment
 * @property string $mail
 * @property string $url
 * @property string $ip
 * @property string $hide
 */
class BlogComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlogComment the static model class
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
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, comment', 'required'),
			array('gid, pid', 'numerical', 'integerOnly'=>true),
			array('date, poster', 'length', 'max'=>20),
			array('mail', 'length', 'max'=>60),
			array('url', 'length', 'max'=>75),
			array('ip', 'length', 'max'=>128),
			array('hide', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, gid, pid, date, poster, comment, mail, url, ip, hide', 'safe', 'on'=>'search'),
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
			'cid' => 'Cid',
			'gid' => 'Gid',
			'pid' => 'Pid',
			'date' => 'Date',
			'poster' => 'Poster',
			'comment' => 'Comment',
			'mail' => 'Mail',
			'url' => 'Url',
			'ip' => 'Ip',
			'hide' => 'Hide',
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

		$criteria->compare('cid',$this->cid);
		$criteria->compare('gid',$this->gid);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('poster',$this->poster,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('hide',$this->hide,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}