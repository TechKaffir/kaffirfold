<?php

/**
 * Payments Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Payments extends Migration
{

    public function alpha()
    {
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('pay_date date NOT NULL');
		$this->addColumn('customer int(11) NOT NULL');
		$this->addColumn('invoice int(11) NOT NULL');
		$this->addColumn('amount decimal(6) NOT NULL');
		$this->addColumn('type varchar(15) NOT NULL');
		$this->addColumn('notes text DEFAULT NULL');

		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		// Primary Key
		$this->addPrimaryKey('id');
		
		
		// Indexing
		$this->addKey('pay_date');
		$this->addKey('invoice');
		// Unique Keys
		// $this->addUniqueKey('key/column');
		// Create Table
		$this->createTable('payments');
    }

    public function omega()
    {
        $this->dropTable('payments');
    }
}
