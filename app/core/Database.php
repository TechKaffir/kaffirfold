<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Database Core Class
 */

Trait Database
{
	private function connect()
	{
		// Set String/DSN
		$string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;

		// Create PDO Instance/Object
		$con = new PDO($string,DBUSER,DBPASS);
		
		return $con;

		### You may set PDO Object Attributes as you wish ###
		// e.g for fetch mode (fetch_assoc, fetch_obj,etc...)
	}

	public function query($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
		}

		return false;
	}

	public function get_row($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result[0];
			}
		}

		return false;
	}
	
}


