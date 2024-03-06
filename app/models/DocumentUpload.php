<?php

/**
 * DocumentUpload Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class DocumentUpload
{

	use Model;

	protected $table = 'document_upload';
	protected $primaryKey = 'doc_id'; 
	


	protected $allowedColumns = [
		'date',
		'Time',
		'patient',
		'document',
		'document_name',
		'created_by',
		'updated_by',
		'date_updated',
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
			'image/webp',
			'application/pdf',
			'application/msword',
			'application/vnd.ms-excel',
			'application/vnd.ms-powerpoint',
		];

		// Document validation - Check inside the file 
		if (empty($files_data['document']['name'])) {
			$this->errors['document'] = 'An document is required!';
		} else 
        if (!isset($files_data['document']['type']) || !in_array($files_data['document']['type'], $allowed_types)) {
			$this->errors['document'] = 'Invalid document type. Only types: ' . implode(', ', $allowed_types) . ' allowed!';
		} else 
		if ($_FILES['document']['error'] !== UPLOAD_ERR_OK) {
			$this->errors['document'] = 'File upload error: ' . $_FILES['document']['error'];
		}

		// Other inputs validation
		if (empty($post_data['document_name'])) {
			$this->errors['document_name'] = "Document Name is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function patientDocs($patient)
	{
		$sql = "SELECT * FROM document_upload WHERE patient = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$patient]);
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($result)
		{
			return $result;
		}
	}
	
	public function docs()
	{
		$sql = "SELECT du.*, p.id, p.Surname, p.First_Name
				FROM document_upload du
				JOIN patients p ON du.patient = p.id
				ORDER BY date DESC 
				";
		$result = $this->query($sql);
		
		return $result;
	}
}
