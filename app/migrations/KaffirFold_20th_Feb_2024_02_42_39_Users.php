<?php

/**
 * Users Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Users extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('image varchar(1024) NOT NULL');
		$this->addColumn('user_id varchar(1024) DEFAULT NULL');
		$this->addColumn('firstname varchar(50) NOT NULL');
		$this->addColumn('surname varchar(50) NOT NULL');
		$this->addColumn('gender varchar(6) NOT NULL');
		$this->addColumn('username varchar(30) NOT NULL');
		$this->addColumn('email varchar(100) NOT NULL');
		$this->addColumn('password varchar(255) NOT NULL');
		$this->addColumn('user_role varchar(50) NOT NULL DEFAULT "User"');
		$this->addColumn('phone varchar(15) NOT NULL');
		$this->addColumn('created datetime NOT NULL DEFAULT current_timestamp()');
		$this->addColumn('reset_token_hash varchar(34) DEFAULT NULL');
		$this->addColumn('reset_token_expires_at datetime DEFAULT NULL');
		
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
	
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('firstname');
		$this->addKey('surname');
		$this->addKey('gender');
		$this->addKey('username');
		$this->addKey('user_role');
		$this->addKey('phone');

		$this->addUniqueKey('reset_token_hash');
		$this->addUniqueKey('email');
		
		$this->createTable('users');

		/** insert data **/
		# if you wish to immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		$this->addData('user_id',rand(10001, 99099));
		$this->addData('firstname','TechKaffir');
		$this->addData('surname','KaffirFold');
		$this->addData('gender','Male');
		$this->addData('username','TheTechKaffir');
		$this->addData('email','thetechkaffir@kaffirfold.co.za');
		$this->addData('password',password_hash('KaffirFold', PASSWORD_DEFAULT));
		$this->addData('user_role','Admin');
		$this->addData('phone','0739644198');

		$this->insertData('users');
    }

    public function omega()
    {
        $this->dropTable('users');
    }
}
