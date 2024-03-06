<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * The Notification Model Class
 */

class Notification
{
	
	use Model;

	protected $table = 'notifications';
	

	protected $allowedColumns = [
        'notification_id',
		'user_id',
		'noti_id',
		'message', 
		'seen', 
		'viewed_by', 
		'created_by', 
		'updated_by', 
		'date_updated', 
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];


        
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
	public function getUnreadNotifications($userId)
	{
		$sql = "SELECT * FROM notifications WHERE user_id = :userId AND seen = 0 ORDER BY date_created DESC";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([':userId' => $userId]);

		$result = $stmt->fetchAll(PDO::FETCH_OBJ);

		if ($result) {
			return $result;
		}

		return []; // Return an empty array if the query fails
	}

	public function notifications()
	{
		$sql = "SELECT n.*, u.* 
				FROM notifications n
				JOIN users u ON n.user_id = u.id 
				AND seen = 0
				";
		$stmt = $this->connect()->prepare($sql);
		
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_OBJ);

		return $result;
	}
	

	public function singleNotification($id)
	{
		$sql = "SELECT n.*, u.* 
				FROM notifications n
				JOIN users u ON n.user_id = u.id
				WHERE n.notification_id = ? 
				";
		$stmt = $this->connect()->prepare($sql);
		
		$stmt->execute([$id]);

		$result = $stmt->fetch(PDO::FETCH_OBJ);

		return $result;
	}

}


