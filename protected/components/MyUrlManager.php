<?php

class MyUrlManager extends CUrlManager
{


	/**
	 * @var array the URL rules (pattern=>route).
	 */
	public $rules=array();
	/**
	 * @var string the URL suffix used when in 'path' format.
	 * For example, ".html" can be used so that the URL looks like pointing to a static HTML page. Defaults to empty.
	 */
	public $urlSuffix='';
	/**
	 * @var boolean whether to show entry script name in the constructed URL. Defaults to true.
	 */
	public $showScriptName=true;
	/**
	 * @var boolean whether to append GET parameters to the path info part. Defaults to true.
	 * This property is only effective when {@link urlFormat} is 'path' and is mainly used when
	 * creating URLs. When it is true, GET parameters will be appended to the path info and
	 * separate from each other using slashes. If this is false, GET parameters will be in query part.
	 * @since 1.0.3
	 */
	public $appendParams=true;
	/**
	 * @var string the GET variable name for route. Defaults to 'r'.
	 */
	public $routeVar='r';
	/**
	 * @var boolean whether routes are case-sensitive. Defaults to true. By setting this to false,
	 * the route in the incoming request will be turned to lower case first before further processing.
	 * As a result, you should follow the convention that you use lower case when specifying
	 * controller mapping ({@link CWebApplication::controllerMap}) and action mapping
	 * ({@link CController::actions}). Also, the directory names for organizing controllers should
	 * be in lower case.
	 * @since 1.0.1
	 */
	public $caseSensitive=true;
	/**
	 * @var boolean whether the GET parameter values should match the corresponding
	 * sub-patterns in a rule before using it to create a URL. Defaults to false, meaning
	 * a rule will be used for creating a URL only if its route and parameter names match the given ones.
	 * If this property is set true, then the given parameter values must also match the corresponding
	 * parameter sub-patterns. Note that setting this property to true will degrade performance.
	 * @since 1.1.0
	 */
	public $matchValue=false;
	/**
	 * @var string the ID of the cache application component that is used to cache the parsed URL rules.
	 * Defaults to 'cache' which refers to the primary cache application component.
	 * Set this property to false if you want to disable caching URL rules.
	 * @since 1.0.3
	 */
	public $cacheID='cache';
	/**
	 * @var boolean whether to enable strict URL parsing.
	 * This property is only effective when {@link urlFormat} is 'path'.
	 * If it is set true, then an incoming URL must match one of the {@link rules URL rules}.
	 * Otherwise, it will be treated as an invalid request and trigger a 404 HTTP exception.
	 * Defaults to false.
	 * @since 1.0.6
	 */
	public $useStrictParsing=false;

	private $_urlFormat=self::GET_FORMAT;
	private $_rules=array();
	private $_baseUrl;





	/**
	 * Creates a path info based on the given parameters.
	 * @param array list of GET parameters
	 * @param string the separator between name and value
	 * @param string the separator between name-value pairs
	 * @param string this is used internally.
	 * @return string the created path info
	 * @since 1.0.3
	 */
	public function createPathInfo($params,$equal,$ampersand, $key=null)
	{
		$pairs = array();
		foreach($params as $k => $v)
		{
			if ($key!==null)
				$k = $key.'['.$k.']';

			if (is_array($v))
				$pairs[]=$this->createPathInfo($v,$equal,$ampersand, $k);
			else
				//$pairs[]=urlencode($k).$equal.urlencode($v);
                 $pairs[]=urlencode($k).$equal.str_replace('%2F','/',urlencode($v));

		}
		return implode($ampersand,$pairs);
	}



}
















/**
 * CUrlRule represents a URL formatting/parsing rule.
 *
 * It mainly consists of two parts: route and pattern. The former classifies
 * the rule so that it only applies to specific controller-action route.
 * The latter performs the actual formatting and parsing role. The pattern
 * may have a set of named parameters.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CUrlManager.php 2071 2010-04-26 21:45:22Z qiang.xue $
 * @package system.web
 * @since 1.0
 */
class MyUrlRule extends CUrlRule
{
	/**
	 * @var string the URL suffix used for this rule.
	 * For example, ".html" can be used so that the URL looks like pointing to a static HTML page.
	 * Defaults to null, meaning using the value of {@link CUrlManager::urlSuffix}.
	 * @since 1.0.6
	 */
	public $urlSuffix;
	/**
	 * @var boolean whether the rule is case sensitive. Defaults to null, meaning
	 * using the value of {@link CUrlManager::caseSensitive}.
	 * @since 1.0.1
	 */
	public $caseSensitive;
	/**
	 * @var array the default GET parameters (name=>value) that this rule provides.
	 * When this rule is used to parse the incoming request, the values declared in this property
	 * will be injected into $_GET.
	 * @since 1.0.8
	 */
	public $defaultParams=array();
	/**
	 * @var boolean whether the GET parameter values should match the corresponding
	 * sub-patterns in the rule when creating a URL. Defaults to null, meaning using the value
	 * of {@link CUrlManager::matchValue}. When this property is false, it means
	 * a rule will be used for creating a URL if its route and parameter names match the given ones.
	 * If this property is set true, then the given parameter values must also match the corresponding
	 * parameter sub-patterns. Note that setting this property to true will degrade performance.
	 * @since 1.1.0
	 */
	public $matchValue;
	/**
	 * @var string the controller/action pair
	 */
	public $route;
	/**
	 * @var array the mapping from route param name to token name (e.g. _r1=><1>)
	 * @since 1.0.5
	 */
	public $references=array();
	/**
	 * @var string the pattern used to match route
	 * @since 1.0.5
	 */
	public $routePattern;
	/**
	 * @var string regular expression used to parse a URL
	 */
	public $pattern;
	/**
	 * @var string template used to construct a URL
	 */
	public $template;
	/**
	 * @var array list of parameters (name=>regular expression)
	 */
	public $params=array();
	/**
	 * @var boolean whether the URL allows additional parameters at the end of the path info.
	 */
	public $append;
	/**
	 * @var boolean whether host info should be considered for this rule
	 * @since 1.0.11
	 */
	public $hasHostInfo;


	/**
	 * Creates a URL based on this rule.
	 * @param CUrlManager the manager
	 * @param string the route
	 * @param array list of parameters
	 * @param string the token separating name-value pairs in the URL.
	 * @return string the constructed URL
	 */
	public function createUrl($manager,$route,$params,$ampersand)
	{
		if($manager->caseSensitive && $this->caseSensitive===null || $this->caseSensitive)
			$case='';
		else
			$case='i';

		$tr=array();
		if($route!==$this->route)
		{
			if($this->routePattern!==null && preg_match($this->routePattern.$case,$route,$matches))
			{
				foreach($this->references as $key=>$name)
					$tr[$name]=$matches[$key];
			}
			else
				return false;
		}

		foreach($this->params as $key=>$value)
			if(!isset($params[$key]))
				return false;

		if($manager->matchValue && $this->matchValue===null || $this->matchValue)
		{
			foreach($this->params as $key=>$value)
			{
				if(!preg_match('/'.$value.'/'.$case,$params[$key]))
					return false;
			}
		}

		foreach($this->params as $key=>$value)
		{
			//$tr["<$key>"]=urlencode($params[$key]);
			$tr["<$key>"]=str_replace('%2F','/',urlencode($params[$key]));			
			unset($params[$key]);
		}

		$suffix=$this->urlSuffix===null ? $manager->urlSuffix : $this->urlSuffix;

		$url=strtr($this->template,$tr);
		if(empty($params))
			return $url!=='' ? $url.$suffix : $url;

		if($this->append)
			$url.='/'.$manager->createPathInfo($params,'/','/').$suffix;
		else
		{
			if($url!=='')
				$url.=$suffix;
			$url.='?'.$manager->createPathInfo($params,'=',$ampersand);
		}
		//return $url;
	}


}
