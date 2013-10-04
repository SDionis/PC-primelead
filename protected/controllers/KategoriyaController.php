<?php
//======================================================================================

class KategoriyaController extends Controller
{
private function jdecoder($json_str) {
  $cyr_chars = array (
    '\u0430' => 'à', '\u0410' => 'À',
    '\u0431' => 'á', '\u0411' => 'Á',
    '\u0432' => 'â', '\u0412' => 'Â',
    '\u0433' => 'ã', '\u0413' => 'Ã',
    '\u0434' => 'ä', '\u0414' => 'Ä',
    '\u0435' => 'å', '\u0415' => 'Å',
    '\u0451' => '¸', '\u0401' => '¨',
    '\u0436' => 'æ', '\u0416' => 'Æ',
    '\u0437' => 'ç', '\u0417' => 'Ç',
    '\u0438' => 'è', '\u0418' => 'È',
    '\u0439' => 'é', '\u0419' => 'É',
    '\u043a' => 'ê', '\u041a' => 'Ê',
    '\u043b' => 'ë', '\u041b' => 'Ë',
    '\u043c' => 'ì', '\u041c' => 'Ì',
    '\u043d' => 'í', '\u041d' => 'Í',
    '\u043e' => 'î', '\u041e' => 'Î',
    '\u043f' => 'ï', '\u041f' => 'Ï',
    '\u0440' => 'ð', '\u0420' => 'Ð',
    '\u0441' => 'ñ', '\u0421' => 'Ñ',
    '\u0442' => 'ò', '\u0422' => 'Ò',
    '\u0443' => 'ó', '\u0423' => 'Ó',
    '\u0444' => 'ô', '\u0424' => 'Ô',
    '\u0445' => 'õ', '\u0425' => 'Õ',
    '\u0446' => 'ö', '\u0426' => 'Ö',
    '\u0447' => '÷', '\u0427' => '×',
    '\u0448' => 'ø', '\u0428' => 'Ø',
    '\u0449' => 'ù', '\u0429' => 'Ù',
    '\u044a' => 'ú', '\u042a' => 'Ú',
    '\u044b' => 'û', '\u042b' => 'Û',
    '\u044c' => 'ü', '\u042c' => 'Ü',
    '\u044d' => 'ý', '\u042d' => 'Ý',
    '\u044e' => 'þ', '\u042e' => 'Þ',
    '\u044f' => 'ÿ', '\u042f' => 'ß',
 
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
			if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			$model2=Kategoriya::model()->Find('translit_url=:translit_url', array(':translit_url'=>$url));
			$model->translit_url=$url;}
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
			if (strlen($model->translit_url)<1)
			{
			$url=$this->transliterate($model->name);
			$model2=Kategoriya::model()->Find('translit_url=:translit_url', array(':translit_url'=>$url));
			$model->translit_url=$url;}
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
	private static $menuTree = array();
 
   public static function getMenuTree() {
        if (empty(self::$menuTree)) {
            $rows = kategoriya::model()->findAll('parent_id=0');
			$Show_all= Kategoriya::model()->Show_first(); 
			self::$menuTree[] = $Show_all; 
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
			   $res = array('label' => $modelRow->name, 'items' => $chump, 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)));}
            else
              {     

				$res = array('label' => $modelRow->name, 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)));}
            return $res;
        } else {
            if (is_array($modelRow)) {
                $arr = array();
                foreach ($modelRow as $leaves) {
                    $arr[] = self::getMenuItems($leaves);
                }
                return $arr;
            } else {
                return array('label' => ($modelRow->name), 'url' => Yii::app()->createUrl('kupon/index', array('kategoriya' => $modelRow->translit_url)));
            }
        }
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kategoriya the loaded model
	 * @throws CHttpException
	 */
	  public function transliterate($st) {
  	$st = iconv('utf-8','windows-1251',$st);
  $st = strtr($st,
    "àáâãäåæçèéêëìíîïðñòóôûýÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÛÝ ",
    "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE-"
  );
  
  $st = strtr($st, array(
    '¸'=>"yo",    'õ'=>"h",  'ö'=>"ts",  '÷'=>"ch", 'ø'=>"sh",
    'ù'=>"shch",  'ú'=>'',   'ü'=>'',    'þ'=>"yu", 'ÿ'=>"ya",
    '¨'=>"Yo",    'Õ'=>"H",  'Ö'=>"Ts",  '×'=>"Ch", 'Ø'=>"Sh",
    'Ù'=>"Shch",  'Ú'=>'',   'Ü'=>'',    'Þ'=>"Yu", 'ß'=>"Ya", '%'=>"",
  ));

  return $st;
}
	
	 
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
