<?php

use core\Routing;

require "conf.inc.php";

function myAutoloader($class){
	$classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.class.php';

	if(file_exists($classPath)){
		include $classPath;
	}
}

spl_autoload_register("myAutoloader");

$slug = explode("?", $_SERVER["REQUEST_URI"])[0];
$routes = Routing::getRoute($slug);
extract($routes);

$typeArr = explode('/', $cPath);
$type = $typeArr[0];

$c = $type . '\\' . $c;

if( file_exists($cPath) ){

    include $cPath;

	if( class_exists($c) ){
		$cObject = new $c();
		if( method_exists($cObject, $a) ){
			$cObject->$a();
		}else{
			die("La methode ".$a." n'existe pas");
		}
		
	}else{
		die("La class controller ".$c." n'existe pas");
	}
}else{
	die("Le fichier controller ".$c." n'existe pas");
}
