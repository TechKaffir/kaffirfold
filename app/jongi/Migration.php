<?php 

/**
 * Migration class
 */



defined('CPATH') OR exit('Access Denied!');


class Migration
{
    use Database;

    protected $columns      = [];
    protected $keys         = [];
    protected $primaryKeys  = [];
    protected $uniqueKeys   = [];
    protected $data         = [];

    protected function createTable($table)
    {
        if(!empty($this->columns))
        {

            $query = "CREATE TABLE IF NOT EXISTS $table (";

            foreach ($this->columns as $column) {
                $query .= $column . ",";
            }
            
            foreach ($this->primaryKeys as $key) {
                $query .= "PRIMARY KEY (".$key . "),";
            }
            
            foreach ($this->uniqueKeys as $key) {
                $query .= "UNIQUE KEY (".$key . "),";
            }

            foreach ($this->keys as $key) {
                $query .= "KEY (".$key . "),";
            }

            $query = trim($query,",");
            $query .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

            $this->query($query);

            $this->columns      = [];
            $this->keys         = [];
            $this->primaryKeys  = [];
            $this->uniqueKeys   = [];

            echo "\n\r Success :) - Table '$table' affected! \n\r";
        }else{

            echo "\n\r Table '$table' could not be created! \n\r";
        }
    }

    protected function addColumn($text)
    {
        $this->columns[] = $text;
    }
    protected function addPrimaryKey($key)
    {
        $this->primaryKeys[] = $key;
    }
    protected function addUniqueKey($key)
    {
        $this->uniqueKeys[] = $key;
    }
    protected function addKey($key)
    {
        $this->keys[] = $key;
    }
    protected function addData($key, $value)
    {
        $this->data[$key] = $value;
    }
    protected function insertData($table)
    {
        if(!empty($this->data))
        {

            $keys = array_keys($this->data);
            $query = "insert into $table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")"; 
            $this->query($query,$this->data);

            $this->data   = [];

            echo "\n\r Data inserted successfully into table: $table \n\r";
        }else{
            echo "\n\r Data could not be inserted into table: $table \n\r";
        }
    }
   
    protected function dropTable($tablename)
    {
        $this->query('drop table ' . $tablename);
        echo "\n\r Table '$tablename' deleted successfully. \n\r";
    }
}