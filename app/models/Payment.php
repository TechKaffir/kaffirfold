<?php

/**
 * Payment Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Payment
{
	use Model;

	protected $table = 'payments';
	protected $primaryKey = 'id';

	protected $allowedColumns = [
		'pay_date',
		'customer',
		'invoice',
		'amount',
		'type',
		'notes',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($post_data, $id = null)
	{
		$this->errors = [];

		if (empty($post_data['pay_date'])) {
			$this->errors['pay_date'] = "Payment date is required";
		}
		if (empty($post_data['customer'])) {
			$this->errors['customer'] = "customer Name is required";
		}
		if (empty($post_data['amount'])) {
			$this->errors['amount'] = "Amount is required";
		}
		if (empty($post_data['type'])) {
			$this->errors['type'] = "Payment type is required(eg EFT,Cash,etc..)";
		}


		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function payments()
	{
		$sql = "SELECT 
		p.id AS paymentID,
		p.pay_date,
		p.invoice,
		p.amount,
		p.type,
		p.notes,
		usr.firstname,
		usr.surname,
		usr.user_id
		FROM payments p 
		LEFT JOIN users usr ON p.customer = usr.user_id
		";

		$payments = $this->query($sql);
		return $payments;
	}

	public function singleCustomerpayments($pay_id) 
	{
		$sql = "SELECT 
				p.pay_date,
				p.amount,
				p.type,
				p.notes,
				usr.firstname,
				usr.surname,
				usr.user_id
				FROM payments p 
				LEFT JOIN users usr ON p.customer = usr.user_id
				WHERE p.id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$pay_id]);

		$payments = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $payments;
	}

	public function scp_specific($pay_id) 
	{
		$sql = "SELECT 
				p.id AS pay_id,
				p.pay_date,
				p.amount,
				p.invoice,
				p.type,
				p.notes,
				p.customer,
				usr.firstname,
				usr.surname,
				usr.user_id,
				usr.email,
				usr.phone
				FROM payments p 
				LEFT JOIN users usr ON p.customer = usr.user_id
				WHERE p.id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$pay_id]);

		$payments = $stmt->fetch(PDO::FETCH_OBJ);
		return $payments;
	}

	public function paymentsWithUserID($user_id)
	{
		$sql = "SELECT p.*,usr.firstname,usr.surname 
				FROM payments p
				LEFT JOIN users usr ON usr.user_id = p.customer
				WHERE customer = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user_id]);
		$paymentsWithUserID = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $paymentsWithUserID;
	}

	public function sumPayments()
	{
		$sql = "SELECT SUM(amount) AS total_payments
				FROM payments
				WHERE YEAR(pay_date) = YEAR(CURRENT_DATE())
				AND MONTH(pay_date) = MONTH(CURRENT_DATE());
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$sumPayments = $stmt->fetch(PDO::FETCH_OBJ);
		return $sumPayments;
	}
	public function recentPayments()
	{
		$sql = "SELECT p.*, usr.firstname, usr.surname
				FROM payments p
				JOIN users usr ON p.customer = usr.user_id
				WHERE YEAR(pay_date) = YEAR(CURRENT_DATE())
				AND MONTH(pay_date) = MONTH(CURRENT_DATE())
				AND usr.user_role = 'Customer';
		";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$recentPayments = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $recentPayments;
	}
}
