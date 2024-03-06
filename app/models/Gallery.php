<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * The Gallery Model Class
 */

class Gallery
{
	
	use Model;

	protected $table = 'gallery';
	

	protected $allowedColumns = [
        'image',
        'updated_by',
        'created_by',
        'date_updated',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

        // Allowed File types
        $allowed_types = [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif',
            'image/webp'
        ];

        // Check inside the file 
        if(empty($data['image']['name']))
        {
            $this->errors['image'] = 'An image is required!';
        } else 
        if(!in_array($data['image']['type'], $allowed_types))
        {
            $this->errors['image'] = 'Invalid Image File Type. Only types: ' . implode(', ', $allowed_types) . ' allowed!';
        }
        
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function create_table()
	{
        $sql = "CREATE TABLE IF NOT EXISTS gallery(
            id INT(11) NOT NULL AUTO_INCREMENT,
            image VARCHAR(1024) NULL,

            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

		$this->query($sql);
	}
}
