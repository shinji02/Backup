<?php
namespace phpAbstractClass;
/*
 * Author: Angelus_2 (Laurent PASQUIER)
 * Made on 2017
 * The author have all right reserved on this file.
 */
require_once dirname(__FILE__).'/../phpInterface/IFactory.php';

use phpInterface\IFactory; 

abstract class AFactory implements IFactory
{
	//protected for legacy in Cfactory.php
	//abstract method force by the implement IFactory

	public function __construct(){
        parent::__construct();
    }
    
	abstract public function query($sql, $hooks);
	
	abstract public function getLastId();
	
	abstract public static function getInstance();
	
    public function __autoload($class_name)
    {

        //class directories
        $directorys = autoloader::dir;

        //for each directory
        foreach($directorys as $directory)
        {
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                return;
            }           
        }
    }
}


