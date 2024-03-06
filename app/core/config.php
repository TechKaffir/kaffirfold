<?php 
defined('ROOTPATH') OR exit('Access Denied!');


// DB Constants
if(empty($_SERVER['SERVER_NAME']) && php_sapi_name() == 'cli' || (!empty($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'))
{
	/** database config **/
	define('DBNAME', 'kf_framework_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'sql');
	
	define('ROOT', 'http://localhost/kaffirfold-framework/public');

}else
{
	/** database config **/
	define('DBNAME', '');
	define('DBHOST', 'localhost');
	define('DBUSER', '');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');

}


/* APP INFO */
define('APP_NAME', "KaffirFold PHP MVC Framework");
define('APP_NAME_SHORT', "KaffirFold");
define('LOGO', "kf-logo.png");
define('FAVICON', "kf-favicon.png");
define('LOGO_IMG_ALT', "KaffirFold Logo");
define('DEFAULT_TIMEZONE', "Africa/Johannesburg");

// Your company and post description
define('APP_DESC', "
With a user-friendly interface and intuitive design patterns, Kaffir Fold Framework takes you from the absolute beginning of your project to about 70% completion in no time. Our framework is not only easy to use but also highly customizable to fit the needs of your unique project. Get started with Kaffir Fold Framework today and watch your App Development process become faster and more efficient than ever before.
");
define('CONTACT_NUMBER','27 65 858 5833');
define('EMAIL_ADDRESS','jongim@jongimbodla.africa');
define('POLICY_ADOPT_DATE','2024-01-01');

define('DEF_CURR','R');
define('JONGI_CLI_VERS','1.0.0');

/* APP ADD ONS */
define('HERO_CTA','Contact Us');
define('HERO_CTA_LINK',ROOT . '/home/contact'); // redirect to the relevant page , eg 'home/blog'
define('HERO_SEC_IMG','kf-tech-4.jpg');
define('GALLERY_IMG_1','kf-tech-1.jpg');
define('GALLERY_IMG_2','kf-tech-2.jpg');
define('GALLERY_IMG_3','kf-tech-3.jpg');
define('NAV_LINK_NAME','Nav Link Name');
define('QR_CODE_PATH',ROOT . '/assets/img/jb-tech-solutions-link.png');
define('DATA_TABLE_1','DATA TABLE 1');
define('TABLE_COLUMN','Column');

/* COMMAND LINE */
define('MPRETEXT','KaffirFold'); // The text at the beginning of the migration file name (e.g. {MPRETEXT}_th_Dec_2023_01_07_27_Persons.php)

/* APP COLORS */
define('THEME_COLOR','primary');  
define('VARIANT_COLOR','#5488ce'); 
# TEXT (Just change 'dark' or 'light')
define('FR_FOOTER_TEXT','text-dark');
define('FR_HERO_DESC_TEXT','text-dark');
define('FR_HERO_DESC_BG',VARIANT_COLOR);
# BG (Just change 'dark' or 'light')
define('BG','bg-light');




/** true means show errors **/
define('DEBUG', true);
