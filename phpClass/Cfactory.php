<?php
namespace factory;
/*
 * Author: Angelus_2 (Laurent PASQUIER)
 * Made on 2017
 * The author have all right reserved on this file.
 */

require_once dirname(__FILE__).'/../phpAbstractClass/AFactory.php';
use PDO;
use phpAbstractClass\AFactory;
use conf\dataBase;

class factory extends AFactory {
    protected $dsn;
    protected $dbNname;
    protected $user;
    protected $pass;
    protected $type;
    protected $pdo;
    protected $pdostatement;
    private static $objInstance;
    
    public function __construct($dsn, $dbName, $user, $pass,$type) {
        $this->dsn = $dsn;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pass = $pass;
        $this->type = $type;
        $this->pdo;
        $this->pdostatement;
               
        $string = $this->type . ':host=' . $dsn . ';dbname=' . $dbName;
        $this->pdo = new PDO($string, $user, $pass, array(1002 => "SET NAMES utf8"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    public function query($sql, $hooks=array()) {
        $i=1;
        $this->pdostatement = $this->pdo->prepare($sql);

        foreach ($hooks as $key => $myArray) {
            $this->pdostatement->bindValue($i,$myArray[0],$myArray[1]);

            $i++;
        }
        $this->pdostatement->execute();
        if ($this->pdostatement->columnCount() > 0) {
            $result=$this->pdostatement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
    }
    
    public function getLastId() {
        return $this->pdo->lastInsertId();
    }
    
    public static function getInstance( $dsn=dataBase::DSN, $dbName=dataBase::DBNAME, 
                                        $user=dataBase::USER, $pass=dataBase::PASS, 
                                        $type = dataBase::TYPE) {
        $objInstance = 'myFactoryStatic';
        if(!self::$objInstance){
            self::$objInstance = new factory($dsn, $dbName, $user, $pass, $type);
        }
        return self::$objInstance;
    }
    
    //Like the constructor, we make __clone private so nobody can clone the instance 
    private function __clone() {} 
	
	public function __autoload($className) {
		parent::__autoload($className);
	} 
}