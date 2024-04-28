<?php

/**
 * Customers Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Customers extends Migration
{
    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('user_id int(11) NOT NULL');
		$this->addColumn('id_number varchar(13) NOT NULL');
		$this->addColumn('domicilium varchar(128) NOT NULL');
		$this->addColumn('emerge_cont_person varchar(50) NOT NULL');
		$this->addColumn('emerge_cont_phone varchar(15) NOT NULL');
		$this->addColumn('employer varchar(50) DEFAULT NULL');
		$this->addColumn('work_cont_name varchar(50) DEFAULT NULL');
		$this->addColumn('work_cont_phone varchar(15) DEFAULT NULL');
		$this->addColumn('work_service int(11) DEFAULT NULL');
		$this->addColumn('monthly_net decimal(30) DEFAULT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		

		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		// Primary Key
		$this->addPrimaryKey('id');
		// Indexing
		$this->addKey('domicilium');
		// Unique Keys
		$this->addUniqueKey('id_number');
		
		$this->createTable('customers');
    }

    public function omega()
    {
        $this->dropTable('customers');
    }
}
