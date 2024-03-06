<?php 
defined('ROOTPATH') OR exit('Access Denied!');
/**
 * Logout Controller Class
 */

class Logout
{
	use Controller;

	public function index()
	{
		$user = new User();
		$user->logout();
        redirect('login');
	}

}