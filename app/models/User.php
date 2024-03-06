<?php
defined('ROOTPATH') or exit('Access Denied!');

/**
 * The User Model Class
 */

class User
{

	use Model;


	protected $table = 'users';


	protected $allowedColumns = [
		'image',
		'user_id',
		'firstname',
		'surname',
		'username',
		'email',
		'phone',
		'gender',
		'user_role',
		'password',
		'reset_token_hash',
	];

	public function validate($files_data, $post_data, $id = null)
	{
		$action = '';
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
		if (empty($post_data['email'])) {
			$this->errors['email'] = "Email is required";
		} else
		if (!filter_var($post_data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else
			// Will come back and edit if it does not work out
			if ($this->first(['email' => $post_data['email']], ['id' => $id])) {
				$this->errors['email'] = "Email is already in use!";
			}

		if (empty($post_data['firstname'])) {
			$this->errors['firstname'] = "First Name is required";
		}
		if (empty($post_data['surname'])) {
			$this->errors['surname'] = "Surname is required";
		}
		if (empty($post_data['username'])) {
			$this->errors['username'] = "Username is required";
		}

		if (empty($post_data['phone'])) {
			$this->errors['phone'] = "Phone is required";
		}

		if ($post_data['user_role'] == 'Select Role') {
			$this->errors['user_role'] = "User Role is required";
		}
		if ($post_data['gender'] == 'Select Gender') {
			$this->errors['gender'] = "Gender is required";
		}

		if (!preg_match("/^[a-zA-Z ]+$/", $post_data['username'])) {
			$this->errors['username'] = "Username can only have letters";
		}
		if (!$id && (empty($post_data['password']) && $action == 'new')) {
			$this->errors['password'] = "Password is required";
		}



		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
	public function pwd_validate($data, $id = null)
	{
		$action = '';
		$this->errors = [];

		if (strlen($data['password']) < 8) {
			$this->errors['password'] = "Password must be at least 8 characters";
		}
		if (!preg_match("/[a-z]/i",$data['password'])) {
			$this->errors['password'] = "Password must contain at least 1 character";
		}
		if (!preg_match("/[0-9]/",$data['password'])) {
			$this->errors['password'] = "Password must contain at least 1 numeric value";
		}
		if ($data['password'] !== $_POST['rp_password']) {
			$this->errors['password'] = "Passwords must match";
		}
		
		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function authenticate($row)
	{
		// Declare Session Variables
		$_SESSION['user'] = $row;
		$_SESSION['userRole'] = $row->user_role;
		$_SESSION['firstname'] = $row->firstname;
		$_SESSION['surname'] = $row->surname;
		$_SESSION['username'] = $row->username;
		$_SESSION['email'] = $row->email;
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
		$_SESSION['status'] = '';
	}

	public function logout()
	{
		if (!empty($_SESSION['user'])) {
			unset($_SESSION['user']);
			// session_destroy();
		}
	}

	public function logged_in()
	{
		if (!empty($_SESSION['user']))
			return true;

		return false;
	}

	public function adminUser()
	{
		if (!empty($_SESSION['user']) && $_SESSION['userRole'] == 'Admin')
			return true;

		return false;
	}

	public function userRowCount()
	{
		$sql = "SELECT COUNT(*) FROM users";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchColumn();

		return $result;
	}

	// Check if email already exists
	public function getUserByEmail($email) 
	{
		$sql = "SELECT * FROM users WHERE email = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		return $user;
	}
	// Check if username already exists
	public function getUserByUsername($username)
	{
		$sql = "SELECT * FROM users WHERE username = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$username]);
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		return $user;
	}
	public function forgotPwd($email)
	{
		$token = bin2hex(random_bytes(16));
		$token_hash = hash('sha256', $token);
		$expiry = date('Y-m-d H:i:s', time() + 60 * 30);

		$sql = "UPDATE users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
		
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$token_hash, $expiry, $email]);
		
		return true;
	}

	public function getResetToken($email)
	{
		$sql = "SELECT reset_token_hash FROM users WHERE email = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);
		$token = $stmt->fetch(PDO::FETCH_OBJ);
		return $token;
	}
	public function tokenInURL($reset_token_hash)
	{
		$sql = "SELECT * FROM users WHERE reset_token_hash = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$reset_token_hash]);
		$reset_token_hash = $stmt->fetch(PDO::FETCH_OBJ);
		return $reset_token_hash;
		
	}
	public function updatePwd($id)
	{
		$sql = "UPDATE users 
				SET reset_token_hash = NULL, reset_token_expires_at = NULL
				WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		
		return true;
	}

}
