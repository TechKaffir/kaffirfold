<?php

/**
 * Department Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Department
{

	use Model;

	protected $table = 'departments';
	protected $primaryKey = 'id'; 

	protected $allowedColumns = [
		'name',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($post_data, $id = null)
	{
		$this->errors = [];

		if (empty($post_data['name'])) {
			$this->errors['name'] = "Department name is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
}
