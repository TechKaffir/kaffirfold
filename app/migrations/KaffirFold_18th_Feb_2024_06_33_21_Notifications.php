<?php

/**
 * Notifications Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Notifications extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('notification_id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('user_id int(10) unsigned NOT NULL DEFAULT 0');
		$this->addColumn('noti_id int(10) unsigned NOT NULL DEFAULT 0');
		$this->addColumn('message varchar(1024) DEFAULT NULL');
		$this->addColumn('seen tinyint(1) DEFAULT 0');
		$this->addColumn('viewed_by varchar(20) NOT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('notification_id');
		
		 # You may add/list your table's keys and unique keys below

		// $this->addKey('key/column');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('notifications');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('notifications')
    }

    public function omega()
    {
        $this->dropTable('notifications');
    }
}
