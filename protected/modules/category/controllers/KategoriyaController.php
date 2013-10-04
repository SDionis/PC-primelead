<?php
//======================================================================================

class KategoriyaController extends Controller
{
private function jdecoder($json_str) {
  $cyr_chars = array (
    '\u0430' => 'а', '\u0410' => 'А',
    '\u0431' => 'б', '\u0411' => 'Б',
    '\u0432' => 'в', '\u0412' => 'В',
    '\u0433' => 'г', '\u0413' => 'Г',
    '\u0434' => 'д', '\u0414' => 'Д',
    '\u0435' => 'е', '\u0415' => 'Е',
    '\u0451' => 'ё', '\u0401' => 'Ё',
    '\u0436' => 'ж', '\u0416' => 'Ж',
    '\u0437' => 'з', '\u0417' => 'З',
    '\u0438' => 'и', '\u0418' => 'И',
    '\u0439' => 'й', '\u0419' => 'Й',
    '\u043a' => 'к', '\u041a' => 'К',
    '\u043b' => 'л', '\u041b' => 'Л',
    '\u043c' => 'м', '\u041c' => 'М',
    '\u043d' => 'н', '\u041d' => 'Н',
    '\u043e' => 'о', '\u041e' => 'О',
    '\u043f' => 'п', '\u041f' => 'П',
    '\u0440' => 'р', '\u0420' => 'Р',
    '\u0441' => 'с', '\u0421' => 'С',
    '\u0442' => 'т', '\u0422' => 'Т',
    '\u0443' => 'у', '\u0423' => 'У',
    '\u0444' => 'ф', '\u0424' => 'Ф',
    '\u0445' => 'х', '\u0425' => 'Х',
    '\u0446' => 'ц', '\u0426' => 'Ц',
    '\u0447' => 'ч', '\u0427' => 'Ч',
    '\u0448' => 'ш', '\u0428' => 'Ш',
    '\u0449' => 'щ', '\u0429' => 'Щ',
    '\u044a' => 'ъ', '\u042a' => 'Ъ',
    '\u044b' => 'ы', '\u042b' => 'Ы',
    '\u044c' => 'ь', '\u042c' => 'Ь',
    '\u044d' => 'э', '\u042d' => 'Э',
    '\u044e' => 'ю', '\u042e' => 'Ю',
    '\u044f' => 'я', '\u042f' => 'Я',
 
    '\r' => '',
    '\n' => '<br />',
    '\t' => ''
  );
 
  foreach ($cyr_chars as $key => $value) {
    $json_str = str_replace($key, $value, $json_str);
  }
  return $json_str;
}
 //======================================================================================
  private function getCommentBetween($text, $leftBorder, $rightBorder)
  {
   $strs = array();
    $offset  = 0;
    $offset2 = 0;
 $i=0;
    while ( ($offset = stripos($text, $leftBorder, $offset2)) !== false ) {
      $offset += strlen($leftBorder);
      $offset2 = stripos($text, $rightBorder, $offset);
      if ($offset2 === false)

      $strs[$i] = substr($text, $offset+3, $offset2-$offset-6);  
	 // echo $strs[$i]."<br />";
	  $i++;
    }
 
    return $strs;
  }
//===================================================================================
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('admin','delete','ParseKategoriyes','getCommentBetween','jdecoder'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
		
	}
public function actionParseKategoriyes()
	{
	 $url = file_get_contents("http://api.hasoffers.com/v3/Application.json?Method=findAllOfferCategories&NetworkToken=NET5wniRTqrWw9ZJXw5P5R9RWs6deK&NetworkId=primeadv");
 $strs = $this->getCommentBetween($url, "name", "status");
 foreach ($strs AS $element)
 {
 $model=new Kategoriya;
 $model->name = $this->jdecoder($element);
 $model->parent_id = 0;
 $model->save();}
 //$this->redirect(array('_view','id'=>$model->id));
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

		if(isset($_POST['Kategoriya']))
		{
			$model->attributes=$_POST['Kategoriya'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		//$dataProvider=new CActiveDataProvider('Kategoriya');
		$this->render('_view');	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kategoriya('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kategoriya']))
			$model->attributes=$_GET['Kategoriya'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

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
