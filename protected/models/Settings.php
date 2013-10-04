<?php

/**
 * This is the model class for table "{{settings}}".
 *
 * The followings are the available columns in table '{{settings}}':
 * @property integer $partner_id
 * @property string $admin_login
 * @property string $admin_user
 * @property integer $main_new_kupons
 * @property integer $main_popular_kupons
 */
class Settings extends CActiveRecord
{

 public $logo_icon; // атрибут для хранения загружаемой картинки статьи
  public $del_logo; // атрибут для удаления уже загруженной картинки
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{settings}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('partner_id, main_new_kupons, main_popular_kupons', 'numerical', 'integerOnly'=>true),
			array('admin_login, admin_user, img_logo_url, site_name, email_admin', 'length', 'max'=>255),
			array('site_description', 'length', 'max'=>400),
			array('Google_Analitics_Code, Yandex_Metrika_Code', 'length', 'max'=>2000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('partner_id, admin_login, admin_user, main_new_kupons, main_popular_kupons', 'safe', 'on'=>'search'),
			array('logo_icon', 'file',
      'types'=>'jpg, gif, png',
      'maxSize'=>1024 * 1024 * 5, // 5 MB
      'allowEmpty'=>'true',
      'tooLarge'=>'Файл весит больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
    ),
	array('del_logo', 'boolean'),
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
			'partner_id' => 'ID партнера',
			'admin_login' => 'Логин администратора',
			'admin_user' => 'Пароль адимнистратора',
			'main_new_kupons' => 'Количество купонов в разделе "Новые" на главной странице',
			'main_popular_kupons' => 'Количество купонов в разделе "Популярные" на главной странице',
			'img_logo_url' => 'Ссылка на логотип',
			'logo_icon' => 'Логотип',
			'del_logo'=>'Удалить логотип?',
			'Google_Analitics_Code'=>'Код Google Analitics',
			'Yandex_Metrika_Code'=>'Код Яндекс Метрики',
			'site_name'=>'Название сайта',
			'site_description'=>'Описание сайта',
			'email_admin'=>'email администратора',
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

		$criteria->compare('partner_id',$this->partner_id);
		$criteria->compare('admin_login',$this->admin_login,true);
		$criteria->compare('admin_user',$this->admin_user,true);
		$criteria->compare('main_new_kupons',$this->main_new_kupons);
		$criteria->compare('main_popular_kupons',$this->main_popular_kupons);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
