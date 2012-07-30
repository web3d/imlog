<?php

/**
 * This is the model class for table "{{blog}}".
 *
 * The followings are the available columns in table '{{blog}}':
 * @property integer $gid
 * @property string $title
 * @property string $date
 * @property string $content
 * @property string $excerpt
 * @property string $alias
 * @property integer $author
 * @property integer $sortid
 * @property string $type
 * @property integer $views
 * @property integer $comnum
 * @property integer $tbcount
 * @property integer $attnum
 * @property string $top
 * @property string $hide
 * @property string $allow_remark
 * @property string $allow_tb
 * @property string $password
 */
class Blog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blog the static model class
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
		return '{{blog}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, content, excerpt', 'required'),
			array('author, sortid, views, comnum, tbcount, attnum', 'numerical', 'integerOnly'=>true),
			array('title, password', 'length', 'max'=>255),
			array('date, type', 'length', 'max'=>20),
			array('alias', 'length', 'max'=>200),
			array('top, hide, allow_remark, allow_tb', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, title, date, content, excerpt, alias, author, sortid, type, views, comnum, tbcount, attnum, top, hide, allow_remark, allow_tb, password', 'safe', 'on'=>'search'),
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
			'gid' => 'Gid',
			'title' => 'Title',
			'date' => 'Date',
			'content' => 'Content',
			'excerpt' => 'Excerpt',
			'alias' => 'Alias',
			'author' => 'Author',
			'sortid' => 'Sortid',
			'type' => 'Type',
			'views' => 'Views',
			'comnum' => 'Comnum',
			'tbcount' => 'Tbcount',
			'attnum' => 'Attnum',
			'top' => 'Top',
			'hide' => 'Hide',
			'allow_remark' => 'Allow Remark',
			'allow_tb' => 'Allow Tb',
			'password' => 'Password',
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

		$criteria->compare('gid',$this->gid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('author',$this->author);
		$criteria->compare('sortid',$this->sortid);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('comnum',$this->comnum);
		$criteria->compare('tbcount',$this->tbcount);
		$criteria->compare('attnum',$this->attnum);
		$criteria->compare('top',$this->top,true);
		$criteria->compare('hide',$this->hide,true);
		$criteria->compare('allow_remark',$this->allow_remark,true);
		$criteria->compare('allow_tb',$this->allow_tb,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}