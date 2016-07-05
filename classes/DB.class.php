<?php
//DB.class.php

class DB {

	protected $db_name = 'homestead';
	protected $db_user = 'homestead';
	protected $db_pass = 'secret';
	protected $db_host = 'localhost';
	protected $pdo     =  null;
	
	//constructor
	public function __construct($db_name='', $db_user='', $db_pass='', $db_host='') {
        if (!$db_name == '')
            $this->db_name = $db_name;
        if (!$db_user == '')
            $this->db_user = $db_user;
        if (!$db_pass == '')
            $this->db_pass = $db_pass;
        if (!$db_host == '')
            $this->db_host = $db_host;
            
        $dsn = "mysql:host=$this->db_host;dbname=$this->db_name;charset=$charset";
        $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $this->db_user, $this->db_pass, $opt);
	}

	//Select rows from the database.
	//returns a full row or rows from $table using $where as the where clause.
	//return value is an associative array with column names as keys.
	public function select($table, $where) {
        $fields = "";
        $values = "";
        foreach($where as $key=>$value){
            $fields .= "$key". ", ";
            $values .= "$value". ", ";
        }
        $mypdo = $this->pdo;
        $stmt = $mypdo->prepareStatement("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id'=>$where]);
	}

	//Updates a current row in the database.
	//takes an array of data, where the keys in the array are the column names
	//and the values are the data that will be inserted into those columns.
	//$table is the name of the table and $where is the sql where clause.
	public function update($data, $table, $where) {
	
	}

	//Inserts a new row into the database.
	//takes an array of data, where the keys in the array are the column names
	//and the values are the data that will be inserted into those columns.
	//$table is the name of the table.
	public function insert($data, $table) {

	}
	
	//delete row in the database given a where clause
	//if no where clause is specifies, defaults to delete *
	public function delete($table, $where='*') {
	
	}

}

?>
