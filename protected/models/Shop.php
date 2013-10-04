<?php

/**
 * This is the model class for table "{{shop}}".
 *
 * The followings are the available columns in table '{{shop}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $translit_url
 * @property string $title_tag
 * @property string $keywords_tag
 * @property string $description_tag
 * @property integer $show
 */
class Shop extends CActiveRecord
{


  public $icon; // атрибут для хранения загружаемой картинки статьи
  public $del_img; // атрибут для удаления уже загруженной картинки
	/**
	 * @return string the associated database table name
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{shop}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('show', 'numerical', 'integerOnly'=>true),
			array('name, translit_url, title_tag, keywords_tag', 'length', 'max'=>255),
			array('del_img', 'boolean'),
			array('image', 'length', 'max'=>250),
			array('description_tag', 'length', 'max'=>400),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, image, translit_url, title_tag, keywords_tag, description_tag, show', 'safe', 'on'=>'search'),
			array('icon', 'file',
      'types'=>'jpg, gif, png',
      'maxSize'=>1024 * 1024 * 5, // 5 MB
      'allowEmpty'=>'true',
      'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
    ),
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
'kupon'=>array(self::HAS_MANY, 'kupon', 'shop_id'),
);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	 public static function All()
{
$models = Shop::model()->findAll(
array('order' => 'name'));
$list = CHtml::listData($models,
'id', 'name');
return $list;
}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название магазина',
			'description' => 'Описание',
			'image' => 'Ссылка на изображение',
			'translit_url' => 'ЧПУ',
			'title_tag' => 'Тег Title',
			'keywords_tag' => 'Тег Keywords',
			'description_tag' => 'Тег Description',
			'show' => 'Опубликовать на сайте',
			'icon' => 'Картинка к статье',
			'del_img'=>'Удалить картинку?',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('translit_url',$this->translit_url,true);
		$criteria->compare('title_tag',$this->title_tag,true);
		$criteria->compare('keywords_tag',$this->keywords_tag,true);
		$criteria->compare('description_tag',$this->description_tag,true);
		$criteria->compare('show',$this->show);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Shop the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
