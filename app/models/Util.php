<?php

/**
 * Util Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Util
{

	use Model;

	// Set a Flash Message
	public static function setFlash($name, $message)
	{
		if (!empty($_SESSION[$name])) {
			unset($_SESSION[$name]);
		}
		$_SESSION[$name] = $message;
	}

	// Display a Flash Message
	public static function displayFlash($name, $type)
	{
		if (isset($_SESSION[$name])) {
			echo '<div class="alert alert-' . $type . ' text-center alert-dismissible fade show" role="alert">
			<span style="font-family: "Times New Roman", Times, serif;"><strong><em>' . $_SESSION[$name] . '</em></strong></span>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  	</div>';
			unset($_SESSION[$name]);
		}
	}

	
}
