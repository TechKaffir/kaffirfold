<?php

/**
 * Employee Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Employee
{

	use Model;

	protected $table = 'employees';
	protected $primaryKey = 'emp_id';
	/* In the case of Users table */
	protected $loginUniqueColumn = 'email';


	protected $allowedColumns = [
		'emp_id',
		'employee_number',
		'dept',
        'address',
        'user_id',
        'employment_date',
        'employment_type',
        'designation',
        'about',
        'date_updated',
        'updated_by',
	];

	/****************************** 
	 * 	RULES INCLUDE:
		alpha
		alpha_space
		alpha_numeric_space
		alpha_numeric_symbol
		email
		numeric
		unique
		symbol
		required
		no_less_chars
		
	 *******************************/
	protected $onInsertValidationRules = [
		'firstname' 	=> [
			'alpha',
			'required'
		],
		'surname' 	=> [
			'alpha',
			'required'
		],
		'username' 	=> [
			'alpha',
			'required'
		],

		'phone' 	=> [
			'numeric'
		],
		'gender' 	=> [
			'required'
		],
		'email' 	=> [
			'email',
			'unique',
			'required'
		],

		'password' 	=> [
			'no_less_chars',
			'required'
		]
	];

	protected $onUpdateValidationRules = [
		'firstname' 	=> [
			'alpha',
			'required'
		],
		'surname' 	=> [
			'alpha',
			'required'
		],
		'username' 	=> [
			'alpha',
			'required'
		],

		'phone' 	=> [
			'numeric'
		],
		'email' 	=> [
			'email',
			'unique',
			'required'
		],

		'password' 	=> [
			'no_less_chars',
			'required'
		]
	];

	/* CUSTOM FUNCTIONS */ 

	public function employee($id)
	{
		$sql = "SELECT e.*, u.* 
				FROM employees e
				LEFT JOIN users u ON e.user_id = u.id
				WHERE emp_id = ? 
				";
		$stmt = $this->connect()->prepare($sql);
		
		$dataArray = array_unshift($id);
		$stmt->execute([$dataArray]);

		$result = $stmt->fetch(PDO::FETCH_OBJ);

		return $result;
	}

	public function employeeList()
	{
		$sql = "SELECT e.*, u.* 
				FROM employees e
				LEFT JOIN users u ON e.user_id = u.id 
				";
		$result = $this->query($sql);

		if($result)
		{
			return $result;
		}
	}
}
