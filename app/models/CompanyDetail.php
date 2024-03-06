<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * The CompanyDetail Model Class
 */



class CompanyDetail
{
	
	use Model;

	protected $table = 'company_details';
	

	protected $allowedColumns = [
		'name',
		'about',
		'email',
		'phone',
        'address',
        'updated_by',
        'date_updated',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

        if(empty($data['name']))
		{
			$this->errors['name'] = "Company name is required";
		}
        
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		} else 
		// Will come back and edit if it does not work out
		if($this->first(['email' => $data['email']],['id' => $id]) )
		{
			$this->errors['email'] = "Email is already in use!";
		}
		if(empty($data['address']))
		{
			$this->errors['address'] = "Company address is required";
		}

        if(empty($data['phone']))
		{
			$this->errors['phone'] = "Company phone is required";
		}
		
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}
