<?php

/**
 * Comment Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Comment
{
	use Model;

	protected $table = 'comments';
	protected $primaryKey = 'id'; 

	/* In the case of Users table */
	protected $loginUniqueColumn = 'email';


	protected $allowedColumns = [
		'fullname',
		'email',
		'comment',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

		if (empty($data['fullname'])) {
			$this->errors['fullname'] = "Fullname is required";
		}

		if (empty($data['email'])) {
			$this->errors['email'] = "Email is required";
		} else
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else
		if ($this->first(['email' => $data['email']], ['id' => $id])) {
			$this->errors['email'] = "Email is already in use!";
		}

		if (empty($data['comment'])) {
			$this->errors['comment'] = "Comment is required";
		}


		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function commentCount()
	{
		$sql = "SELECT COUNT(*) FROM comments";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchColumn();
		return $result;
	}
}
