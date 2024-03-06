<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * The Category Model Class
 */



class Category
{
	
	use Model;

	protected $table = 'categories';
	

	protected $allowedColumns = [
		'id',
		'cat_name',
		'created_by',
		'updated_by',
		'date_created',
		'date_updated',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

        if(empty($data['cat_name']))
		{
			$this->errors['cat_name'] = "Category name is required!";
		}


		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function create_table()
	{
        $sql = "CREATE TABLE IF NOT EXISTS categories (
            id int(11) NOT NULL AUTO_INCREMENT,
			cat_name VARCHAR(20) NOT NULL,
            
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

		$this->query($sql);
	}
}
