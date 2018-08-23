<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backup;

class Cbackup {
	
	public function __construct() {
		
	}
	
	public function sendComnnad($siteAddr){
		
		$user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)'; 
		$url = $siteAddr."/backup/back.php";
		        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'); 
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
		
		echo $output;
        // close curl resource to free up system resources
        curl_close($ch);  
		
	}
	
	public function __destruct() {
	
	}
}