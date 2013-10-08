<?php

class ShopController extends Controller
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
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Shop;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{

			$model->attributes=$_POST['Shop'];
			if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			$model->translit_url=$url;}

			$model->icon=CUploadedFile::getInstance($model,'icon');
			if ($model->icon){
				$sourcePath = pathinfo($model->icon->getName());	
				$fileName = date("l-dS-of-F-Y-h-i-s-A").'.'.$sourcePath['extension'];
				$model->image = $fileName ;
			}
			if($model->save()){
			if ($model->icon){				
					//ñîõğàíèòü ôàéë íà ñåğâåğå â êàòàëîã images/2011 ïîä èìåíåì 
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

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			//$model2=Shop::model()->Find('translit_url=:translit_url', array(':translit_url'=>$url));
			$model->translit_url=$url;}
			if($model->save()){
			if ($model->icon){				
					//ñîõğàíèòü ôàéë íà ñåğâåğå â êàòàëîã images/2011 ïîä èìåíåì 
					//month-day-alias.jpg
					$file ="images/$fileName";
					$model->icon->saveAs($file);
				}
				$this->redirect(array('view','id'=>$model->id));}
		}
		
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function post_image($id, $image, $width='150', $class='post_img'){
  if(isset($image))
    return CHtml::image(Yii::app()->getBaseUrl(true)."/images/$image",'',
      array(
        'width'=>$width,
        'class'=>$class
      )
    );
  else
    return CHtml::image(Yii::app()->getBaseUrl(true).'/images/pics/noimage.gif','Íåò êàğòèíêè',
      array(
        'width'=>$width,
        'class'=>$class
      )
    );
 }
		  public function transliterate($st) {
  	$st = iconv('utf-8','windows-1251',$st);
  $st = strtr($st,
    "àáâãäåæçèéêëìíîïğñòóôûıÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÛİ ",
    "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE-"
  );
  
  $st = strtr($st, array(
    '¸'=>"yo",    'õ'=>"h",  'ö'=>"ts",  '÷'=>"ch", 'ø'=>"sh",
    'ù'=>"shch",  'ú'=>'',   'ü'=>'',    'ş'=>"yu", 'ÿ'=>"ya",
    '¨'=>"Yo",    'Õ'=>"H",  'Ö'=>"Ts",  '×'=>"Ch", 'Ø'=>"Sh",
    'Ù'=>"Shch",  'Ú'=>'',   'Ü'=>'',    'Ş'=>"Yu", 'ß'=>"Ya", '%'=>"",
  ));

  //$st=urlencode($st);
   // $st =  rawurldecode($st);
  return $st;
}
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}


	public function actionIndex()
	{
		$model=new Shop('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Shop']))
			$model->attributes=$_GET['Shop'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Shop the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Shop::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Shop $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='shop-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
