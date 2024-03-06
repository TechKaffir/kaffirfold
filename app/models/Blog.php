<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * The Blog Model Class
 */


class Blog
{
	
	use Model;

	protected $table = 'posts';
	

	protected $allowedColumns = [
        'image',
		'title',
		'content',
		'author',
		'category',
		'updated_by',
		'date_updated',
	]; 

	public function validate($files_data, $post_data, $id = null)
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

        // Image validation - Check inside the file 
        if(empty($files_data['image']['tmp_name']))
        {
            $this->errors['image'] = 'An image is required!';
        } else 
        if(!isset($files_data['image']['type']) || !in_array($files_data['image']['type'], $allowed_types))
        {
            $this->errors['image'] = 'Invalid Image File Type. Only types: ' . implode(', ', $allowed_types) . ' allowed!';
        } else 
		if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
			$this->errors['image'] = 'File upload error: ' . $_FILES['image']['error'];
		} 

		// Other inputs validation
		if(empty($post_data['title']))
        {
            $this->errors['title'] = 'A title is required!';
        }
		if(empty($post_data['content']))
        {
            $this->errors['content'] = 'Post Content is required!';
        }
		if($post_data['category'] == 'Select Category')
        {
            $this->errors['category'] = 'You need to select Post Category';
        }
        
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function postsWithcats()
	{
		$sql = "SELECT p.*, c.* 
				FROM posts AS p 
				LEFT JOIN categories AS c ON c.id = p.category
			";
		$results = $this->query($sql);

		return $results;
	}

	public function singlePost($id)
	{
		$sql = "SELECT p.*, c.* 
				FROM posts p 
				LEFT JOIN categories c ON c.id = p.category 
				WHERE post_id = ? 
				";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);

		$result = $stmt->fetch(PDO::FETCH_OBJ);

		if ($result) {
			return $result;
		}

	}

	public function recentPosts()
	{
		$sql = "SELECT * FROM posts WHERE date_posted >= CURDATE() - INTERVAL 1 MONTH";
		
		$result = $this->query($sql);
		return $result;
	}

	public function search($filtervalue)
	{
		$sql = "SELECT p.*, c.* 
				FROM posts p 
				LEFT JOIN categories c ON c.id = p.category 
				WHERE CONCAT(p.post_id, p.title, p.content, p.author, c.id, c.cat_name, p.date_posted) LIKE '%$filtervalue%'
				";

		$result = $this->query($sql);

		if ($result) {
			return $result;
		}
	}
}


