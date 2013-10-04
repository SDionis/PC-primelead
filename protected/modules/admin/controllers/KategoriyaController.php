<?php

class KategoriyaController extends Controller
{

	/**
	 * @return array action filters
	 */
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
		$model=new Kategoriya;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kategoriya']))
		{
			$model->attributes=$_POST['Kategoriya'];
			if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			$model2=Kategoriya::model()->Find('translit_url=:translit_url', array(':translit_url'=>$url));
			$model->translit_url=$url;}
			if($model->save())
				$this->redirect(array('index','id'=>$model->id));
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

		if(isset($_POST['Kategoriya']))
		{
			$model->attributes=$_POST['Kategoriya'];
			if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			$model2=Kategoriya::model()->Find('translit_url=:translit_url', array(':translit_url'=>$url));
			$model->translit_url=$url;}
			if($model->save())
				$this->redirect(array('index','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
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

  return $st;
}
	 
	 
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	$model=new Kategoriya('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kategoriya']))
			$model->attributes=$_GET['Kategoriya'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kategoriya the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kategoriya::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kategoriya $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kategoriya-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
