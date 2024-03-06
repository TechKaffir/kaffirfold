<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Main Core Controller Class
 */

Trait Controller
{

	public function view($name, $data = [])
	{
		if(!empty($data))
			extract($data);
		
		$filename = "../app/views/".$name.".kf.php";
		if(file_exists($filename))
		{
			require $filename;
		}else{

			$filename = "../app/views/front/404.kf.php";
			require $filename;
		}
	}
}