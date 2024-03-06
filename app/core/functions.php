<?php
defined('ROOTPATH') or exit('Access Denied!');

/** check which php extensions are required **/
check_extensions();
function check_extensions()
{

	$required_extensions = [

		'gd',
		'mysqli',
		'pdo_mysql',
		'pdo_sqlite',
		'curl',
		'fileinfo',
		'intl',
		'exif',
		'mbstring',
	];

	$not_loaded = [];

	foreach ($required_extensions as $ext) {

		if (!extension_loaded($ext)) {
			$not_loaded[] = $ext;
		}
	}

	if (!empty($not_loaded)) {
		show("Please load the following extension(s) in your php.ini file: <br>" . "-" . implode("<br>", $not_loaded));
		die;
	}
}

/** returns a user readable date format **/
function get_date($date)
{
	return date("jS M, Y", strtotime($date));
}

function show($stuff)
{
	echo "<pre style='background-color:#519f44; color:#fff;padding:10px;margin-top:90px'>";
	print_r($stuff);
	echo '<br><hr>';
	echo '<em><strong>' . APP_NAME_SHORT . ' Debug: ' . date(DATE_RFC2822) . "<strong><em></pre>";
}

function esc($str)
{
	return htmlspecialchars($str);
}


function redirect($path)
{
	header("Location: " . ROOT . "/" . $path);
	die;
}

function old_value($key, $default = '')
{
	if (!empty($_POST[$key]))
		return $_POST[$key];
	elseif (!empty($_FILES[$key]))
		return $_FILES[$key];

	return $default;
}

function user($key = '')
{
	if (!empty($_SESSION['user'])) {
		if (empty($key))
			return $_SESSION['user'];

		if (!empty($_SESSION['user']->$key)) {
			return $_SESSION['user']->$key;
		}
	}

	return '';
}

/** load an image, and if it does not exist, load a placeholder **/
function get_image($file = '', $type = 'post')
{

	$file = $file ?? '';
	if (file_exists($file)) {
		return ROOT . "/" . $file;
	}

	if ($type == 'user') {
		return ROOT . "/assets/img/user.png";
	} else {
		return ROOT . "/assets/img/img-ph.png";
	}
}

function get_doc($doc_name = '')
{
	if (file_exists($doc_name))
		return ROOT . '/' . $doc_name;
}

function addNotification($data)
{
	$notif = new Notification();
	$data['date_created'] = date('Y-m-d H:i:s');
	$notif->insert($data);
}

function extract_id_from_url($url)
{
	// Parse the URL
	$parsed_url = parse_url($url);

	// Get the path component
	$path = $parsed_url['path'];

	// Split the path into segments
	$segments = explode('/', $path);

	// Extract the ID from the last segment
	$id = end($segments);

	return $id;
}


