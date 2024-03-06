<?php
defined('ROOTPATH') or exit('Access Denied!');
/**
 * Admin Controller Class
 */
use Dompdf\Dompdf;

class Admin
{
	use Controller;

	public function index()
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$notification = new Notification();

		/*** CHECK IF USER IS LOGGED IN ***/
		if (!$user->logged_in())
			redirect('login');

		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['num_users'] = $user->userRowCount();
		// Notifications
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		$data['page_title'] = 'Dashboard';
		$data['action'] = '';

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('admin/index', $data);
	}
	public function users($action = null, $id = null)
	{
		$user = new User();
		$notification = new Notification;


		// Create Users' Profile Folder
		$folder = 'uploads/users/';
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$data['rows'] = $user->findAll();
		// Notifications
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));
		


		if ($action == 'new') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($user->validate($_FILES, $_POST)) {
					// Upload User Profile Image
					$destination = $folder . time() . '_' . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$_POST['image'] = $destination;

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Check if email does not exist
						$user_email = $user->getUserByEmail($_POST['email']);
						$username = $user->getUserByUsername($_POST['username']);
						if ($user_email) {
							Util::setFlash('email_exists_error', 'Email already in use by another user!!');
							redirect('admin/users/new');
						} else 
						if ($username) {
							Util::setFlash('username_exists_error', 'Username already in use by another user!!');
							redirect('admin/users/new');
						} else {
							// Hash The Submitted Password
							$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
							// Insert New User details into DB
							$user->insert($_POST);
							Util::setFlash('register_success', 'User Registered Successfully!!');
							redirect('admin/users'); 
						}
					}
				}
			}
		} else 
		if ($action == 'edit') {
			$data['row'] = $user->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($user->validate($_FILES, $_POST)) {
					// Check if password is available, if not there's nothing to update
					if (empty($_POST['password'])) {
						unset($_POST['password']);
					} else { // else update the password
						$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					}

					// Update the uploaded User Profile image
					$destination = $folder . time() . '_' . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$_POST['image'] = $destination;

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Update User
						$user->update($id, $_POST);
						Util::setFlash('user_update_success', 'User record updated successfully!!');

						// // Delete the old image
						// if (file_exists($data['row']->image))
						// 	unlink($data['row']->image);

						redirect('admin/users');
					}
				}
			}
		} else 
		if ($action == 'view') {

			$data['singleUser'] = $user->first(['id' => $id]);
		} else 
		if ($action == 'delete') {
			$data['row'] = $user->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					$user->delete($id);

					// Delete the image
					if (file_exists($data['row']->image))
						unlink($data['row']->image);

						Util::setFlash('user_delete_success', 'User deleted successfully!!');
					redirect('admin/users');
				}
			}
		}
		$data['errors'] = $user->errors;
		$data['page_title'] = 'Users';


		$this->view('admin/users/users', $data);
	}
	public function link($action = null, $id = null)
	{
		$user = new User();
		$social_link = new SocialLink();
		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$social_link->limit = 1;
		$data['social_links'] = $social_link->findAll();
		$data['admin_user'] = $user->adminUser();

		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		if ($action == 'edit') {
			$data['row'] = $social_link->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($social_link->validate($_POST, $id)) {

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$social_link->update($id, $_POST);
						Util::setFlash('link_update_success','Record updated successfully!!');

						redirect('admin/link');
					}
				}
			}
		}

		$data['errors'] = $social_link->errors;
		$data['page_title'] = 'Social Links';


		$this->view('admin/company/social_link', $data);
	}
	public function companyDetails($action = null, $id = null)
	{
		$user = new User();
		$company_detail = new CompanyDetail();
		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$company_detail->limit = 1;
		$data['company_details'] = $company_detail->findAll();
		$data['admin_user'] = $user->adminUser();

		if ($action == 'edit') {
			$data['row'] = $company_detail->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($company_detail->validate($_POST, $id)) {

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$company_detail->update($id, $_POST);
						Util::setFlash('company_details_update_success', 'Company details updated Successfully!!');
						redirect('admin/companydetails');
					}
				}
			}
		}

		$data['errors'] = $company_detail->errors;
		$data['page_title'] = 'Company Details';


		$this->view('admin/company/company_details', $data);
	}
	public function operatingHours($action = null, $id = null)
	{
		$user = new User();
		$op_hour = new OperatingHour();
		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$op_hour->limit = 1;
		$data['op_hours'] = $op_hour->findAll();
		$data['admin_user'] = $user->adminUser();

		if ($action == 'edit') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($op_hour->validate($_POST, $id)) {

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$op_hour->update($id, $_POST);
						Util::setFlash('ophours_update_success', 'Operating hours updated successfully!!');
						redirect('admin/operatingHours');
					}
				}
			}
		}

		$data['errors'] = $op_hour->errors;
		$data['page_title'] = 'Operating Hours';


		$this->view('admin/company/op-hours', $data);
	}
	public function gallery($action = null, $id = null)
	{
		$user = new User();
		$gallery = new Gallery();
		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		// Create Gallery Folder
		$folder = 'uploads/gallery/';
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$data['images'] = $gallery->findAll();


		if ($action == 'new') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($gallery->validate($_FILES)) {

					$destination = $folder . time() . '_' . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$_POST['image'] = $destination;
					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$gallery->insert($_POST);

						Util::setFlash('image_upload_success', 'Image uploaded successfully!!');

						redirect('admin/gallery');
					}
				}
			}
		} else 
		if ($action == 'edit') {
			$data['row'] = $gallery->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($gallery->validate($_FILES, $id)) {
					$folder = '';
					$destination = $folder . time() . '_' . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$_POST['image'] = $destination;
					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$gallery->update($id, $_POST);

						if (file_exists($data['row']->image))
							unlink($data['row']->image);

						Util::setFlash('image_update_success', 'Image updated successfully!!');
						redirect('admin/gallery');
					}
				}
			}
		} else 
		if ($action == 'delete') {
			$data['row'] = $gallery->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					$gallery->delete($id);

					if (file_exists($data['row']->image))
						unlink($data['row']->image);
					
					Util::setFlash('image_delete_success', 'Image deleted successfully!!');
					redirect('admin/gallery');
				}
			}
		}
		$data['errors'] = $gallery->errors;
		$data['page_title'] = APP_NAME . ' Image Gallery';


		$this->view('admin/company/gallery', $data);
	}
	public function blog($action = null, $id = null)
	{
		$user = new User();
		$blog = new blog();
		$category = new Category();

		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		// Create blog Folder
		$folder = 'uploads/blog/';
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$data['posts'] = $blog->postsWithcats();
		$data['categories'] = $category->findAll();

		if ($action == 'new') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($_FILES['image']['error'] == UPLOAD_ERR_OK && $blog->validate($_FILES, $_POST)) {

					$destination = $folder . time() . '_' . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$_POST['image'] = $destination;
					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$blog->insert($_POST);
						Util::setFlash('post_create_success', 'Post created successfully!!');
						redirect('admin/blog');
					}
				}
			}
		} else 
		if ($action == 'edit') {
			$data['row'] = $blog->first(['post_id' => $id]);
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($blog->validate($_FILES, $_POST, $id)) {
					$folder = '';
					$destination = $folder . time() . '_' . $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $destination);

					$_POST['image'] = $destination;
					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$blog->update($id, $_POST, 'post_id');

						if (file_exists($data['row']->image))
							unlink($data['row']->image);

						Util::setFlash('post_update_success', 'Post updated successfully!!');
						redirect('admin/blog');
					}
				}
			}
		} else 
		if ($action == 'delete') {
			$data['row'] = $blog->first(['post_id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					$blog->delete($id, 'post_id');

					if (file_exists($data['row']->image))
						unlink($data['row']->image);

					Util::setFlash('post_delete_success', 'Post deleted successfully!!');
					redirect('admin/blog');
				}
			}
		}
		$data['errors'] = $blog->errors;
		$data['page_title'] = APP_NAME . ' Blog Spot';


		$this->view('admin/company/blog', $data);
	}
	public function categories($action = null, $id = null)
	{
		$user = new User();
		$category = new Category();

		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$data['categories'] = $category->findAll();


		if ($action == 'new') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($category->validate($_POST)) {

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Insert New Post into DB
						$category->insert($_POST);
						Util::setFlash('cat_create_success', 'Category created successfully!!');
						redirect('admin/categories');
					}
				}
			}
		} else 
		if ($action == 'edit') {
			$data['row'] = $category->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($category->validate($_POST, $id)) {

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Update the post
						$category->update($id, $_POST);
						Util::setFlash('cat_updated_success', 'Category updated successfully!!');
						redirect('admin/categories');
					}
				}
			}
		} else 
		if ($action == 'delete') {
			$data['row'] = $category->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					$category->delete($id);
					Util::setFlash('cat_deleted_success', 'Category deleted successfully!!');
					redirect('admin/categories');
				}
			}
		}
		$data['errors'] = $category->errors;
		$data['page_title'] = APP_NAME . ' Blog Post Categories';


		$this->view('admin/company/categories', $data);
	}
	public function notifications($action = null, $id = null)
	{
		$user = new User();
		// Notification Object
		$notification = new Notification();
		$user = new User();

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$data['notifications'] = $notification->findAll();
		$data['users'] = $user->findAll();
		$data['unreadNotifications'] = $notification->notifications(user('id'));

		if ($action == 'new') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($notification->validate($_POST)) {
					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Insert New Post into DB
						$notification->insert($_POST);
						Util::setFlash('not_create_success', 'Notification created successfully!!');
						redirect('admin/notifications');
					}
				}
			}
		} else 
		if ($action == 'edit') {
			$data['row'] = $notification->first(['notification_id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($notification->validate($_POST, $id)) {
					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Update the notification
						$notification->update($id, $_POST, 'notification_id');
						Util::setFlash('not_update_success', 'Notification updated successfully!!');
						redirect('admin/notifications');
					}
				}
			}
		} else 
		if ($action == 'view') {
			$url = ROOT . "/admin/notifications/view/$id";
			$id = extract_id_from_url($url);
			$data['id'] = $id;
			$data['singleNote'] = $notification->singleNotification($data['id']);
		} else 
		if ($action == 'delete') {
			$data['row'] = $notification->first(['notification_id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					$notification->delete($id, 'notification_id');
					Util::setFlash('not_delete_success', 'Notification deleted successfully!!');
					redirect('admin/notifications');
				}
			}
		}
		$data['errors'] = $notification->errors;
		$data['page_title'] = APP_NAME . ' Notifications';

		$this->view('admin/company/notifications', $data);
	}
	
	public function documents($action = null, $id = null)
	{
		$user = new User();
		$document = new DocumentUpload();

		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		// Check if current user is logged in 
		if (!$user->logged_in())
			redirect('login');

		// Create documents Folder
		$folder = 'uploads/documents/';
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

		$data['action'] = $action;
		$data['rows'] = $document->docs();

		if ($action == 'new') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($_FILES['document']['error'] == UPLOAD_ERR_OK && $document->validate($_FILES, $_POST)) {

					$destination = $folder . time() . '_' . $_FILES['document']['name'];
					move_uploaded_file($_FILES['document']['tmp_name'], $destination);

					$_POST['document'] = $destination;

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$document->insert($_POST);
						Util::setFlash('doc_upload_success', 'Document uploaded successfully!!');
						redirect('admin/documents');
					}
				}
			}
		} else 
		if ($action == 'edit') {
			$data['row'] = $document->first(['doc_Id' => $id]);
	
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($document->validate($_FILES, $_POST, $id)) {
					$folder = '';
					$destination = $folder . time() . '_' . $_FILES['document']['name'];
					move_uploaded_file($_FILES['document']['tmp_name'], $destination);

					$_POST['document'] = $destination;
					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						$document->update($id, $_POST, 'doc_Id');

						if (file_exists($data['row']->document))
							unlink($data['row']->document);
						Util::setFlash('doc_update_success', 'Document updated successfully!!');
						redirect('admin/documents');
					}
				}
			}
		} else 
		if ($action == 'delete') {
			$data['row'] = $document->first(['doc_Id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					$document->delete($id, 'doc_Id');

					if (file_exists($data['row']->document))
						unlink($data['row']->document);
					Util::setFlash('doc_delete_success', 'Document deleted successfully!!');
					redirect('admin/documents');
				}
			}
		}
		$data['errors'] = $document->errors;
		$data['page_title'] = 'Uploaded Documents';


		$this->view('admin/patients/documents', $data);
	}
	
	public function departments($action = null, $id = null)
	{
		$user = new User();
		$department = new Department();

		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['action'] = $action;
		$data['departments'] = $department->findAll();


		if ($action == 'new') {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($department->validate($_POST)) {

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Insert New Dept into DB
						$department->insert($_POST);
						Util::setFlash('dept_create_success', 'Department added successfully!!');
						redirect('admin/departments');
					}
				}
			}
		} else 
		if ($action == 'edit') {
			$data['row'] = $department->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($department->validate($_POST, $id)) {

					if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF Token!');
					} else {
						// Update department
						$department->update($id, $_POST);
						Util::setFlash('dept_update_success', 'Department updated successfully!!');
						redirect('admin/departments');
					}
				}
			}
		} else 
		if ($action == 'delete') {
			$data['row'] = $department->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					$department->delete($id);
					Util::setFlash('dept_delete_success', 'Department deleted successfully!!');
					redirect('admin/departments');
				}
			}
		}
		$data['errors'] = $department->errors;
		$data['page_title'] = APP_NAME . ' Departments';


		$this->view('admin/company/departments', $data);
	}
	
}
