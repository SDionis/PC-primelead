<?php

class KuponController extends Controller
{
/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2kupon';

	/**
	 * @return array action filters
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','ImportCSV'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
public function actionName($translit_url)
	{

		$this->render('name',array(
			'model'=>$this->loadModelName($translit_url),
		));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
public function actionView($translit_url)
	{

		$this->render('view',array(
			'model'=>$this->loadModelName($translit_url),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Kupon;
		$date=date_create();
$model->date_create=date_format($date, 'Y-m-d H:i:s');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kupon']))
		{
			$model->attributes=$_POST['Kupon'];
			//$shop=$model->shop;
		//	echo $shop;
			//$shop_img=Shop::model()->FindByAttributes(array('name'=>"$shop"));
			//echo $shop_img->image;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
	
}
		$this->render('create',array(
			'model'=>$model,
		));
		
		
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kupon']))
		{
			$model->attributes=$_POST['Kupon'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
public function post_image($id, $img_url, $width){
 
  if(strlen($img_url)>1)
   return CHtml::image(Yii::app()->getBaseUrl(true)."/images/$img_url",'',
      array(
        'width'=>$width,
   )
    );
  else if (strlen($img_url)<1)
    return CHtml::image(Yii::app()->getBaseUrl(true)."/images/pics/home.gif",'Нет картинки',
      array(
        'width'=>$width,
     )
    );
 }
 
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
		{
	if(!empty($_GET['kategoriya']))

{
$translit_url=$_GET['kategoriya'];
$Criteria = new CDbCriteria();
$Criteria->condition = "translit_url LIKE '$translit_url'";
$kategoriya_id = kategoriya::model()->findAll($Criteria);
foreach ($kategoriya_id AS $stroka)
{$id_kategory=$stroka->id;}
$criteria=new CDbCriteria(array(
'condition'=>'categorry_id=:id',
'params' => array(':id'=>(int)$id_kategory),
'with' => array('kategoriya'),
));
}         
else
{ //Пользователь ничего не выбрал из меню
$criteria=new CDbCriteria(array(
'with' => array('kategoriya'),                              
));   
}
	
		$dataProvider=new CActiveDataProvider('Kupon',array(
'criteria'=>$criteria,
'sort'=>array(
        'defaultOrder'=>array(
            'finish_date'=>true,
        ),
    ),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
			//$dataProvider->sort->defaultOrder='finish_date';
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kupon('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kupon']))
			$model->attributes=$_GET['Kupon'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	
	
	private static $menuTree = array();
 
   public static function getMenuTree() {
        if (empty(self::$menuTree)) {
            $rows = kategoriya::model()->findAll('parent_id=0');
		
            foreach ($rows as $item) {
			
                self::$menuTree[] = self::getMenuItems($item);
            }
        }
        return self::$menuTree;
    }
 
    private static function getMenuItems($modelRow) {
  


        if (!$modelRow)
            return;
 
        if (isset($modelRow->Childs)) {
            $chump = self::getMenuItems($modelRow->Childs);
            if ($chump != null)
               { 
			   $id=$modelRow->id;
$kuponcount=Kupon::model()->count('categorry_id=:categorry_id', array(':categorry_id'=>$id));
			   $res = array('label' => $modelRow->name." ($kuponcount)", 'items' => $chump, 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)),'linkOptions'=>array('class'=>'invarseColor'));}
            else
              {     
$id=$modelRow->id;
$kuponcount=Kupon::model()->count('categorry_id=:categorry_id', array(':categorry_id'=>$id));
				$res = array('label' => $modelRow->name." ($kuponcount)", 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)),'linkOptions'=>array('class'=>'invarseColor'));}
            return $res;
        } else {
            if (is_array($modelRow)) {
                $arr = array();
                foreach ($modelRow as $leaves) {
                    $arr[] = self::getMenuItems2($leaves);
                }
                return $arr;
            } else {
			$id=$modelRow->id;
$kuponcount=Kupon::model()->count('categorry_id=:categorry_id', array(':categorry_id'=>$id));
                return array('label' => ($modelRow->name)." ($kuponcount)", 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)),'linkOptions'=>array('class'=>'invarseColor'));
            }
        }
    }
	
	
	   private static function getMenuItems2($modelRow) {
 
        if (!$modelRow)
            return;
 
        if (isset($modelRow->Childs)) {
            $chump = self::getMenuItems($modelRow->Childs);
            if ($chump != null)
               { 
			   $id=$modelRow->id;
$kuponcount=Kupon::model()->count('categorry_id=:categorry_id', array(':categorry_id'=>$id));
			   $res = array('label' => "<i class='icon-caret-right'></i>".$modelRow->name." ($kuponcount)", 'items' => $chump, 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)),'linkOptions'=>array('class'=>'invarseColor'));}
            else
              {     
$id=$modelRow->id;
$kuponcount=Kupon::model()->count('categorry_id=:categorry_id', array(':categorry_id'=>$id));
				$res = array('label' => "<i class='icon-caret-right'></i>".$modelRow->name." ($kuponcount)", 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)),'linkOptions'=>array('class'=>'invarseColor'));}
            return $res;
        } else {
            if (is_array($modelRow)) {
                $arr = array();
                foreach ($modelRow as $leaves) {
                    $arr[] = self::getMenuItems2($leaves);
                }
                return $arr;
            } else {
			$id=$modelRow->id;
$kuponcount=Kupon::model()->count('categorry_id=:categorry_id', array(':categorry_id'=>$id));
                return array('label' => "<i class='icon-caret-right'></i>".($modelRow->name)." ($kuponcount)", 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)),'linkOptions'=>array('class'=>'invarseColor'));
            }
        }
    }
	/**
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kupon the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kupon::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
public function loadModelName($translit_url)
	{
		$model=Kupon::model()->find('translit_url=:translit_url',array(':translit_url'=>$translit_url));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kupon $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kupon-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
		public function actionImportCSV()
{
$filePath = 'http://test.raido.biz.ua/pokupon/export.csv'; 
$row = 1;
$model=new Kupon;
$model->id="12000";
$model->save();
if (($handle = fopen("$filePath", "r")) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

$num = count($data);
$row++;
$model=new Kupon;
$model->name=iconv('windows-1251','utf-8',$data[0]);
$model->categorry_id=iconv('windows-1251','utf-8',$data[1]);
$model->description=iconv('windows-1251','utf-8',$data[2]);
$model->date_create=iconv('windows-1251','utf-8',$data[3]);
$model->shop_id=iconv('windows-1251','utf-8',$data[4]);
$model->translit_url=iconv('windows-1251','utf-8',$data[5]);
$model->promokod=iconv('windows-1251','utf-8',$data[6]);
$model->finish_date=iconv('windows-1251','utf-8',$data[7]);
$model->keywords_tag=iconv('windows-1251','utf-8',$data[8]);
$model->use_count=iconv('windows-1251','utf-8',$data[9]);
$model->type_id=iconv('windows-1251','utf-8',$data[10]);
$model->img_url=iconv('windows-1251','utf-8',$data[11]);
$model->id=iconv('windows-1251','utf-8',$data[12]);
$id=iconv('windows-1251','utf-8',$data[12]);
$id=iconv('windows-1251','utf-8',$data[12]);
$model2=Kupon::model()->FindAll('id=:id', array(':id'=>$id));
if  (empty($model2)){
$model->save();
}
}}

$filePath = 'http://test.raido.biz.ua/pokupon/export2.csv'; 
$row = 1;
$model=new Shop;
$model->id="12000";
$model->save();
if (($handle = fopen("$filePath", "r")) !== FALSE) {

while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

$num = count($data);
$row++;
$model=new Shop;
$model->name=iconv('windows-1251','utf-8',$data[0]);
$model->image=iconv('windows-1251','utf-8',$data[1]);
$model->description=iconv('windows-1251','utf-8',$data[2]);
$model->translit_url=iconv('windows-1251','utf-8',$data[3]);
$model->title_tag=iconv('windows-1251','utf-8',$data[4]);
$model->description_tag=iconv('windows-1251','utf-8',$data[5]);
$model->keywords_tag=iconv('windows-1251','utf-8',$data[6]);
$model->id=iconv('windows-1251','utf-8',$data[7]);
$id=iconv('windows-1251','utf-8',$data[7]);
$model2=Shop::model()->Find('id=:id', array(':id'=>$id));
if  (empty($model2)){
$model->save();}
}



$filePath = 'http://test.raido.biz.ua/pokupon/export3.csv'; 
$row = 1;
$model=new Kategoriya;
$model->id="12000";
$model->save();
if (($handle = fopen("$filePath", "r")) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

$num = count($data);
$row++;
$model=new Kategoriya;
$model->name=iconv('windows-1251','utf-8',$data[0]);
$model->parent_id=iconv('windows-1251','utf-8',$data[1]);
$model->translit_url=iconv('windows-1251','utf-8',$data[2]);
$model->id=iconv('windows-1251','utf-8',$data[3]);
$id=iconv('windows-1251','utf-8',$data[3]);
$model2=Kategoriya::model()->FindAll('id=:id', array(':id'=>$id));
if  (empty($model2)){
$model->save();}
}
}
}
$filePath = 'http://test.raido.biz.ua/pokupon/export4.csv'; 
$row = 1;
$model=new KuponType;
$model->id="12000";
$model->save();
if (($handle = fopen("$filePath", "r")) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

$num = count($data);
$row++;
$model=new KuponType;
$model->name=iconv('windows-1251','utf-8',$data[0]);
$model->id=iconv('windows-1251','utf-8',$data[1]);
$id=iconv('windows-1251','utf-8',$data[1]);
$model2=KuponType::model()->FindAll('id=:id', array(':id'=>$id));
if  (empty($model2)){
$model->save();}
}
}
 header('Location: http://test.raido.biz.ua/good-click/index.php/admin');
}


}
