<?php 
	spl_autoload_register('myAutoLoader');

	#!!!!!!....this one is also applicable....!!!!

	// function myAutoLoader($className){
	// 	$path = "classes/";
	// 	$ext =".class.php";
	// 	$fullpath = $path.$className.$ext;

	// 	if(!file_exists($fullpath)){
	// 		return false;
	// 	}

	// 	include_once $fullpath;

	// }

	# following method is better than above one..use this..!
	function myAutoLoader($className){
		$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

		if(strpos($url,'includes') !== false){
			$path = "../classes/";
		}
		else{
			$path = "classes/";
		}
	
		$ext =".class.php";
		$fullpath = $path.$className.$ext;

		if(!file_exists($fullpath)){
			return false;
		}

		include_once $fullpath;

	}

 ?>