<?php

/**
 * This is the model class for table "{{kategoriya}}".
 *
 * The followings are the available columns in table '{{kategoriya}}':
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $parent_id
 * @property string $translit_url
 */
class Kategoriya extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{kategoriya}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name, translit_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, parent_id, translit_url', 'safe', 'on'=>'search'),
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
'kupon'=>array(self::HAS_MANY, 'kupon', 'categorry_id'),
'Childs' => array(self::HAS_MANY, 'kategoriya', 'parent_id'),
);
}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название категории',
			'parent_id' => 'ID родительской категории',
			'translit_url' => 'ЧПУ',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('translit_url',$this->translit_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
* Returns the list of all category.
* @return list data of all category
*/
public static function AllParents()
{
$Criteria = new CDbCriteria();
$Criteria->condition = "parent_id=0";
$models = Kategoriya::model()->findAll($Criteria,
array('order' => 'name'));
$list = CHtml::listData($models,
'id', 'name');
return $list;
}

public static function All()
{
$models = Kategoriya::model()->findAll(
array('order' => 'name'));
$list = CHtml::listData($models,
'id', 'name');
return $list;
}

public static function All_shown()
{
$allkuponcount=Kupon::model()->count();
//это первый пункт меню Показать всё. 
$r[] =   array('label'=>'Показать все'." ($allkuponcount)", 
'url'=>array('/kupon/index','kategoriya'=>''),'linkOptions'=>array('class'=>'invarseColor'),);      
$models = Kategoriya::model()->findAll(
array('order' => 'name',
)
);
foreach($models as $val)
{
$id=$val->id;
$kuponcount=Kupon::model()->count('categorry_id=:categorry_id', array(':categorry_id'=>$id));
//дополняю массив элементами меню
$r[] =   array('label'=>$val->name." ($kuponcount)", 
'url'=>array('/kupon/index','kategoriya'=>$val->translit_url),'linkOptions'=>array('class'=>'invarseColor'),);
//$s[]=" ($kuponcount)";
}
//Возвращаю массив с элементами меню 
return $r;
}	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kategoriya the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
