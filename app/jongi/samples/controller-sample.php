<?php 

/**
 * CLASSNAME class 
 */

defined('ROOTPATH') OR exit('Access Denied!');

class CLASSNAME
{
	use Controller;
	
	public function index() 
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		// ${classname} = new CLASSNAME(); 

		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['page_title'] = '{classname}';

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('{classname}',$data);
	}
}
