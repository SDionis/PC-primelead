<?php

class KuponController extends Controller
{

	
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
				'actions'=>array('create','update','delete','ImportCSV','Podkategory'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','delete','ImportCSV','Podkategory'),
				'users'=>array('index'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	
    

		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	
	
	 public function actionPodkategory()
	{ 
	 $model = Kategoriya::model()->findByPk($_POST['uplevel_id']);
	 $id=$model->id;
	  $data = Kategoriya::model()
        ->findAll(array('condition' =>
        "parent_id = $id",
        'order' => 'name ASC'
        ));
$data = CHtml::listData($data, 'id', 'name');
 $model = new Kupon();
 if(!$data){
        echo CHtml::activeHiddenField($product_model, 'categorry_id', array('value'=>$_POST['uplevel_id']));
    } else {
       echo CHtml::activeDropDownList( $model,
            'categorry_id',
            $data,
            array('prompt'=>'Choose subcategory',
	 'class'=>'droplist',
            )
        );
        echo '<div id="subcat_0"></div>';}


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
				if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			$model2=Shop::model()->Find('translit_url=:translit_url', array(':translit_url'=>$url));
			$model->translit_url=$url;}
			$model->icon=CUploadedFile::getInstance($model,'icon');
			if ($model->icon){
				$sourcePath = pathinfo($model->icon->getName());	
				$fileName = date("l-dS-of-F-Y-h-i-s-A").'.'.$sourcePath['extension'];
				$model->img_url = $fileName ;
			}
			if($model->save())
		{	if ($model->icon){				
					//сохранить файл на сервере в каталог images/2011 под именем 
					//month-day-alias.jpg
					$file ="images/$fileName";
					$model->icon->saveAs($file);
				}
				$this->redirect(array('view','id'=>$model->id));}
	
}
		$this->render('create',array(
			'model'=>$model,
		));
}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kupon']))
		{
			$model->attributes=$_POST['Kupon'];
			if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			$model2=Shop::model()->Find('translit_url=:translit_url', array(':translit_url'=>$url));
			$model->translit_url=$url;}
			$model->icon=CUploadedFile::getInstance($model,'icon');
			if ($model->icon){
				$sourcePath = pathinfo($model->icon->getName());	
				$fileName = date("l-dS-of-F-Y-h-i-s-A").'.'.$sourcePath['extension'];
				$model->img_url = $fileName ;
			}
			if ($model->icon){				
					//сохранить файл на сервере в каталог images/2011 под именем 
					//month-day-alias.jpg
					$file ="images/$fileName";
					$model->icon->saveAs($file);
				}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	  public function transliterate($st) {
  	$st = iconv('utf-8','windows-1251',$st);
  $st = strtr($st,
    "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ ",
    "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE-"
  );
  
  $st = strtr($st, array(
    'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",
    'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",
    'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",
    'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya", '%'=>"",
  ));

  //$st=urlencode($st);
   // $st =  rawurldecode($st);
  return $st;
}
public function post_image($id, $img_url, $width='150', $class='post_img'){
  if(strlen($img_url)>1)
   { return CHtml::image(Yii::app()->getBaseUrl(true)."/images/$img_url",'',
      array(
        'width'=>$width,
        'class'=>$class
      )
    );}
  else if (strlen($img_url)<1)
   { return CHtml::image(Yii::app()->getBaseUrl(true)."/images/pics/home.gif",'Нет картинки',
      array(
        'width'=>$width,
        'class'=>$class
      )
    );}
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


	public function actionIndex()
	{
		$model=new Kupon('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kupon']))
			$model->attributes=$_GET['Kupon'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

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
 

$filePath = 'http://primekupon.com.ua/export.csv'; 
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
$model->offer_id=iconv('windows-1251','utf-8',$data[13]);
$model->kupon_url=iconv('windows-1251','utf-8',$data[14]);
$id=iconv('windows-1251','utf-8',$data[12]);
$id=iconv('windows-1251','utf-8',$data[12]);
$model2=Kupon::model()->FindAll('id=:id', array(':id'=>$id));
if  (empty($model2)){
$model->save();
}
}}

$filePath = 'http://primekupon.com.ua/export2.csv'; 
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



$filePath = 'http://primekupon.com.ua/export3.csv'; 
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
$filePath = 'http://primekupon.com.ua/export4.csv'; 
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
$base_url=Yii::app()->request->baseUrl;
$kupon=Kupon::model()->FindAll();
foreach($kupon AS $item)
{
$pic=$item->img_url;
if(strlen($pic)>1)
{file_put_contents("images/$pic",file_get_contents("http://primekupon.com.ua/images/$pic"));}
}
$kupon=Shop::model()->FindAll();
foreach($kupon AS $item)
{
$pic=$item->image;
if (strlen($pic)>1)
{file_put_contents("images/$pic",file_get_contents("http://primekupon.com.ua/images/$pic"));} 
}
 header('Location: /admin');
}


}

