<?php
namespace MySmarty;
/*
 * Author: Angelus_2 (Laurent PASQUIER)
 * Made on 2017
 * The author have all right reserved on this file.
 */

define('SMARTY_DIR', dirname(__FILE__).'/../libs/smarty/');
require_once(SMARTY_DIR . 'Smarty.class.php');
require_once(dirname(__FILE__).'/../libs/smarty/Smarty.class.php');
 
class MySmarty extends \Smarty
{
	private $smarty;
	static $instance = null;

	public static function getInstance($newInstance = null)
	{
	  if( !is_null($newInstance) )
		self::$instance = $newInstance;
	  if ( is_null(self::$instance) )
		self::$instance = new MySmarty();
	  return self::$instance;
	}

	public function __construct()
	{
	  parent::__construct();
	  // initialize smarty here
	  require (dirname(__FILE__).'/../conf/smarty.php');
	  $this->smarty = new \Smarty();
	  $this->smarty->template_dir = $smartySettings['template_dir'];
	  $this->smarty->compile_dir  = $smartySettings['compile_dir'];
	  $this->smarty->config_dir   = $smartySettings['config_dir'];
	  $this->smarty->cache_dir    = $smartySettings['cache_dir'];
	}
	
	public static function mimify($result)
	{
		if ($result!="") {
			return preg_replace('![\t ]*[\r\n]+[\t ]*!', '', $result);
		}
	}
	
	public static function tplToJs($result)
	{
		if ($result!="") {
			return str_replace('"','\"',$result);
		}
	}
	public function __autoload($className) {
		parent::__autoload($className);
	} 
}  
