<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Database Core Class
 */

Trait Database
{
	private function connect()
	{
		try {
			// Set String/DSN
			$string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;

			// Create PDO Instance/Object
			$con = new PDO($string,DBUSER,DBPASS);

			return $con;

			// Set the default fetch mode to FETCH_OBJ
			$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			// Other PDO options can be set here as well, if needed
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			// Handle any errors
			echo 'Connection failed: ' . $e->getMessage();
		}
		
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


