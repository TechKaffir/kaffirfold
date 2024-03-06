<?php

/**
 * CLASSNAME Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class CLASSNAME extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		

		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		// $this->addKey('key/column');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('{classname}');

		/** insert data **/
		# if you wish to immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('{classname}');
    }

    public function omega()
    {
        $this->dropTable('{classname}');
    }
}
