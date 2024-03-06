<?php

/**
 * DocumentUpload Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class DocumentUpload extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('doc_Id int(10) unsigned NOT NULL AUTO_INCREMENT');
		$this->addColumn('date date DEFAULT NULL');
		$this->addColumn('Time time DEFAULT NULL');
		$this->addColumn('patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('document blob DEFAULT NULL');
		$this->addColumn('document_name varchar(40) DEFAULT NULL');

		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('doc_Id');
		
		 # You may add/list your table's keys and unique keys below

		// $this->addKey('key/column');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('document_upload');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('document_upload')
    }

    public function omega()
    {
        $this->dropTable('document_upload');
    }
}
