<?php

class SettingsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Settings;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			$model->attributes=$_POST['Settings'];
			$model->logo_icon=CUploadedFile::getInstance($model,'logo_icon');
			if ($model->logo_icon){
				$sourcePath = pathinfo($model->logo_icon->getName());	
				$fileName = date("l-dS-of-F-Y-h-i-s-A").'.'.$sourcePath['extension'];
				$model->img_url = $fileName ;
			}
			if($model->save())
			if ($model->logo_icon){				
					//сохранить файл на сервере в каталог images/2011 под именем 
					//month-day-alias.jpg
					$file ='E:/xampp/htdocs/top-class/good-click/images/'.$fileName;
					$model->logo_icon->saveAs($file);
				}
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
public function post_logo($id, $img_logo_url, $height, $class='post_img'){
  if(strlen($img_logo_url)>1)
   { return CHtml::image(Yii::app()->getBaseUrl(true)."/images/$img_logo_url",'',
      array(
        'height'=>$height,
        'class'=>$class
      )
    );}
  else if (strlen($img_logo_url)<1)
   { return CHtml::image(Yii::app()->getBaseUrl(true)."/images/pics/home.gif",'Нет картинки',
      array(
        'height'=>$height,
        'class'=>$class
      )
    );}
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

		if(isset($_POST['Settings']))
		{
			$model->attributes=$_POST['Settings'];
			$model->logo_icon=CUploadedFile::getInstance($model,'logo_icon');
			if ($model->logo_icon){
				$sourcePath = pathinfo($model->logo_icon->getName());	
				$fileName = date("l-dS-of-F-Y-h-i-s-A").'.'.$sourcePath['extension'];
				$model->img_logo_url = $fileName ;
			}
			$model->save();
			if ($model->logo_icon){				
					//сохранить файл на сервере в каталог images/2011 под именем 
					//month-day-alias.jpg
					$file ='E:/xampp/htdocs/top-class/good-click/images/'.$fileName;
					$model->logo_icon->saveAs($file);
				}
			//	$this->redirect(array('view','id'=>$model->ID));
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
		$dataProvider=new CActiveDataProvider('Settings');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Settings('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Settings']))
			$model->attributes=$_GET['Settings'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Settings the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Settings::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Settings $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='settings-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
