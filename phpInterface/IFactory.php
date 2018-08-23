<?php
namespace phpInterface;
/*
 * Author: Angelus_2 (Laurent PASQUIER)
 * Made on 2017
 * The author have all right reserved on this file.
 */

interface IFactory
{
	//to force method without explain it

	public function query($sql, $hooks);
	public function getLastId();
	public static function getInstance();
	public function __autoload($class_name);
}