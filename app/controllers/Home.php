<?php
defined('ROOTPATH') or exit('Access Denied!');
/**
 * Home Controller Class 
 */

class Home
{
	use Controller;

	public function index()
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$gallery = new Gallery();
		$blog = new Blog();
		$op_hour = new OperatingHour();
		

		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Home';
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]);
		$data['op_hours'] = $op_hour->first(['id' => 1]);
		$data['gallery'] = $gallery->findAll();
		$data['posts'] = $blog->findAll();
		


		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('front/home', $data);
	}

	public function blog() 
	{
		// User
		$user = new User();
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Blog Spot';
		$data['logged_in_user'] = $user->logged_in();

		// Social Links
		$contact = new SocialLink();
		$data['social_link'] = $contact->first(['id' => 1]);

		// Company Details
		$detail = new CompanyDetail();
		$data['comp_detail'] = $detail->first(['id' => 1]);

		// Gallery
		$gallery = new Gallery();
		$data['gallery'] = $gallery->findAll();

		// Blog
		$blog = new Blog();
		$data['posts'] = $blog->postsWithcats();
		$data['recentPosts'] = $blog->recentPosts();

		// Categories
		$category = new Category();
		$data['categories'] = $category->findAll();

		$this->view('front/pages/blog', $data);
	}

	public function register()
	{
	}

	public function singleblog($id = null)
	{
		// User
		$user = new User();
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Blog Spot';
		$data['logged_in_user'] = $user->logged_in();
		$data['session_id'] = session_id();
		// Social Links
		$contact = new SocialLink();
		$data['social_link'] = $contact->first(['id' => 1]);
		// Company Details
		$detail = new CompanyDetail();
		$data['comp_detail'] = $detail->first(['id' => 1]);
		// Gallery
		$gallery = new Gallery();
		$data['gallery'] = $gallery->findAll();
		// Blog
		$blog = new Blog();
		$data['posts'] = $blog->findAll();
		$data['single_post'] = $blog->singlePost($id);
		// show($data['single_post']); die;
		$data['recentPosts'] = $blog->recentPosts();

		// Categories
		$category = new Category();
		$data['categories'] = $category->findAll();

		// Comments 
		$comment = new Comment();
		$data['comments'] = $comment->findAll();
		$data['num_comments'] = $comment->commentCount();
		

		// Insert new comment into DB
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			if ($comment->validate($_POST,$id)) 
			{
				if($data['session_id'] !== $_POST['session_id'])
				{
					die('We could not process your request!');
				} else 
				{
					// Insert New User details into DB
					$comment->insert($_POST);

					redirect("home/singleblog/$id/#blog-comments");
				}
			}
		}

		$data['errors'] = $comment->errors;

		/** RETURN THIS VIEW **/
		$this->view('front/pages/single-blog', $data);
	}

	public function blogSearch()
	{
		$blog = new Blog();
		if(isset($_GET['search']))
		{
			$data['search_list'] = $blog->search($_GET['search']);
		}

		$this->view('front/pages/blog', $data);
	}

	public function contact()
	{
		// User
		$user = new User();
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Contact Us';
		$data['logged_in_user'] = $user->logged_in();
		$data['session_id'] = session_id();
		// Social Links
		$contact = new SocialLink();
		$data['social_link'] = $contact->first(['id' => 1]);
		// Company Details
		$detail = new CompanyDetail();
		$data['comp_detail'] = $detail->first(['id' => 1]);

		$this->view('front/pages/contact',$data);
	}

	public function popia()
	{
		// User
		$user = new User();
		$data['users'] = $user->findAll();
		$data['page_title'] = 'POPI Act Compliance Statement';
		$data['logged_in_user'] = $user->logged_in();
		$data['session_id'] = session_id();
		// Social Links
		$contact = new SocialLink();
		$data['social_link'] = $contact->first(['id' => 1]);
		// Company Details
		$detail = new CompanyDetail();
		$data['comp_detail'] = $detail->first(['id' => 1]);

		$this->view('front/pages/popia',$data);
	}
	public function privacy()
	{
		// User
		$user = new User();
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Privacy Policy';
		$data['logged_in_user'] = $user->logged_in();
		$data['session_id'] = session_id();
		// Social Links
		$contact = new SocialLink();
		$data['social_link'] = $contact->first(['id' => 1]);
		// Company Details
		$detail = new CompanyDetail();
		$data['comp_detail'] = $detail->first(['id' => 1]);

		$this->view('front/pages/privacy',$data);
	}
}
