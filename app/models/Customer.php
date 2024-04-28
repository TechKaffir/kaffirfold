<?php

/**
 * Customer Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Customer
{

	use Model;

	protected $table = 'customers';
	protected $primaryKey = 'id'; 
	
	protected $allowedColumns = [
		'user_id',
		'id_number',
		'domicilium',
		'emerge_cont_person',
		'emerge_cont_phone',
		'employer',
		'work_cont_name',
		'work_cont_phone',
		'work_service',
		'monthly_net',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($files_data,$post_data, $id = null)
	{
		$this->errors = [];

		// Allowed File types
		$allowed_types = [
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/webp'
		];

		// Image validation - Check inside the file 
		if (empty($files_data['image']['name'])) {
			$this->errors['image'] = 'An image is required!';
		} else 
        if (!isset($files_data['image']['type']) || !in_array($files_data['image']['type'], $allowed_types)) {
			$this->errors['image'] = 'Invalid Image File Type. Only types: ' . implode(', ', $allowed_types) . ' allowed!';
		} else 
		if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
			$this->errors['image'] = 'File upload error: ' . $_FILES['image']['error'];
		}

		// Other inputs validation

		if (empty($post_data['id_number'])) {
			$this->errors['id_number'] = "customer's ID number is required";
		}
		if (empty($post_data['domicilium'])) {
			$this->errors['domicilium'] = "customer's domicilium et executandi is required";
		}
		if (empty($post_data['emerge_cont_person'])) {
			$this->errors['emerge_cont_person'] = "Contact person is required";
		}
		if (empty($post_data['emerge_cont_phone'])) {
			$this->errors['emerge_cont_phone'] = "Contact phone number is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}



	public function customersAll() 
	{
		$sql = "SELECT c.*,usr.*
		        FROM customers c
		        LEFT JOIN users usr ON c.user_id = usr.user_id
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $customers;
	}
	
	public function customers()
	{
		$sql = "SELECT c.*, u.*,u.id AS userID
				FROM customers c
				INNER JOIN users u ON u.user_id = c.user_id
		";
		$customers = $this->query($sql);
		return $customers;
	}

	public function singleCustomer($user_id) 
	{
		$sql = "SELECT c.*, u.*
				FROM customers c
				INNER JOIN users u ON u.user_id = c.user_id
				WHERE c.user_id = ?
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_id]);

		$customer = $stmt->fetch(PDO::FETCH_OBJ);
		return $customer;
	}
	public function singleCustomerUserUnit($user_id) 
	{
		$sql = "SELECT c.*, u.*
				FROM customers c
				INNER JOIN users u ON u.user_id = c.user_id
				WHERE c.user_id = ?
		";
		$stmt = $this->connect()->prepare($sql); 
		$stmt->execute([$user_id]);

		$customer = $stmt->fetch(PDO::FETCH_OBJ);
		return $customer;
	}
	
	public function singleCustomerAllModules($user_id) 
	{
		$sql = "SELECT
		c.id AS tenant_id,
		c.id_number,
		c.domicilium,
		c.emerge_cont_person,
		c.emerge_cont_phone,
		c.employer,
		c.work_cont_name,
		c.work_cont_phone,
		c.work_service,
		c.monthly_net,
		c.date_created,
		usr.firstname AS user_firstname,
		usr.surname AS user_surname,
		usr.phone AS user_phone,
		usr.email AS user_email,
		usr.user_id,
		usr.image
		FROM customers c
		LEFT JOIN users usr ON c.user_id = usr.user_id
		WHERE c.user_id = ?;
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_id]);

		$customer = $stmt->fetch(PDO::FETCH_OBJ);
		return $customer;
	}
	
	public function scp_specific($user_id) 
	{
		$sql = "SELECT 
				p.pay_date,
				p.payment_for,
				p.rental_month,
				p.amount,
				p.type,
				p.pop,
				p.notes,
				usr.firstname,
				usr.surname,
				usr.user_id,
				usr.phone
				FROM payments p 
				LEFT JOIN users usr ON p.customer = usr.user_id
				LEFT JOIN units u ON p.unit = u.id
				WHERE customer = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_id]);

		$payments = $stmt->fetch(PDO::FETCH_OBJ);
		return $payments;
	}
	
	public function customersWIthComplaints()
	{
		$sql = "SELECT
		c.*,
		cust.id AS customer_id,
		usr.firstname AS user_firstname,
		usr.surname AS user_surname,
		usr.phone AS user_phone,
		usr.email AS user_email,
		usr.user_id,
		usr.image
		FROM complaints c
		LEFT JOIN customers cust ON c.customer = cust.user_id
		LEFT JOIN users usr ON cust.user_id = usr.user_id
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$customer = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $customer;
	}
	
}
	

