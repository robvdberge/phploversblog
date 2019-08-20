<?php
include $_SERVER['DOCUMENT_ROOT'].'/phploversblog/config/config.php';

class Database
{
    public $host        = DB_HOST;
    public $username    = DB_USER;
    public $pass        = DB_PASS;
    public $dbname      = DB_NAME;

    public $link; // mysqli object
    public $error; // error object

    public function __construct()
    {
        // Call connect
        $this->connect();
    }

    private function connect()
    {
        $this->link = new mysqli($this->host, $this->username, $this->pass, $this->dbname);

        if ( !$this->link ){
            $this->error = 'Connection failed: ' . $this->link->connect_error;
            return false;
        }
    }

    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ( $result->num_rows > 0 ){
            return $result;
        } else {
            return FALSE;
        }
    }

    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
        
        // Validate insert
        if ( $insert_row ){
            header("location: index.php?msg=" . urlencode('record added') );
            exit();
        } else {
            die('Error: (' . $this->link->error . ') ' . $this->link->error );
        }
    }

    public function update($query)
    {
        $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
        
        // Validate insert
        if ( $update_row ){
            header("location: index.php?msg=" . urlencode('record updated') );
            exit();
        } else {
            die('Error: (' . $this->link->error . ') ' . $this->link->error );
        }
    }

    public function delete($query)
    {
        $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
        
        // Validate insert
        if ( $delete_row ){
            header("location: index.php?msg=" . urlencode('record deleted') );
            exit();
        } else {
            die('Error: (' . $this->link->error . ') ' . $this->link->error );
        }
    }

}