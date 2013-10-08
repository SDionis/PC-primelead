<?php

/**
 * This is the model class for table "{{kupon}}".
 *
 * The followings are the available columns in table '{{kupon}}':
 * @property integer $id
 * @property integer $shop_id
 * @property string $description
 * @property string $translit_url
 * @property string $promokod
 * @property string $finish_date
 * @property string $date_create
 * @property string $img_url
 * @property string $name
 * @property integer $categorry_id
 * @property string $title_tag
 * @property string $description_tag
 * @property string $keywords_tag
 * @property integer $show
 * @property integer $offer_id
 * @property integer $use_count
 * @property integer $type_id
 */
class Kupon extends CActiveRecord
{
  public $icon; // атрибут для хранения загружаемой картинки статьи
  public $del_img; // атрибут для удаления уже загруженной картинки
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{kupon}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, finish_date, promokod, categorry_id, shop_id, type_id', 'required'),
			array('shop_id, categorry_id, show,  use_count, type_id', 'numerical', 'integerOnly'=>true),
			array('translit_url, promokod, img_url, title_tag, kupon_url', 'length', 'max'=>255),
			array('name, description_tag, keywords_tag', 'length', 'max'=>400),
			array('del_img', 'boolean'),
			array('finish_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a date!', 'dateFormat' => 'yyyy-MM-dd'),
			array('icon', 'file',
      'types'=>'jpg, gif, png',
      'maxSize'=>1024 * 1024 * 5, // 5 MB
      'allowEmpty'=>'true',
      'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
    ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shop_id, description, translit_url, promokod, finish_date, date_create, img_url, name, categorry_id, title_tag, description_tag, keywords_tag, show, offer_id, use_count, type_id', 'safe', 'on'=>'search'),
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
		'kategoriya' => array(self::BELONGS_TO, 'Kategoriya', 'categorry_id'),
		'shop' => array(self::BELONGS_TO, 'Shop', 'shop_id'),
		'KuponType' => array(self::BELONGS_TO, 'KuponType', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название Купона',
			'categorry_id' => 'Категория',
			'shop_id' => 'Название магазина',
			'description' => 'Описание',
			'translit_url' => 'ЧПУ',
			'promokod' => 'Промокод',
			'finish_date' => 'Дата окончания действия промокода',
			'date_create' => 'Дата создания купона',
			'img_url' => 'Ссылка на изображение',
			'title_tag' => 'Тег Title',
			'description_tag' => 'Тег описание',
			'keywords_tag' => 'Ключевые слова',
			'show' => 'Опубликовать купон',
			'use_count' => 'Количество использований купона',
			'type_id' => 'Тип купона',
			'icon' => 'Картинка к статье',
			'del_img'=>'Удалить картинку?',
            'kupon_url'=>'Ссылка для купона',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('shop_id',$this->shop_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('translit_url',$this->translit_url,true);
		$criteria->compare('promokod',$this->promokod,true);
		$criteria->compare('finish_date',$this->finish_date,true);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('img_url',$this->img_url,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('categorry_id',$this->categorry_id);
		$criteria->compare('title_tag',$this->title_tag,true);
		$criteria->compare('description_tag',$this->description_tag,true);
		$criteria->compare('keywords_tag',$this->keywords_tag,true);
		$criteria->compare('show',$this->show);
		$criteria->compare('offer_id',$this->offer_id);
		$criteria->compare('use_count',$this->use_count);
		$criteria->compare('type_id',$this->type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kupon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
