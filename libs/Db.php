<?php
class Db
{
	public $host = DB_HOST;
	public $username = DB_USER;
	public $password = DB_PASS;
	public $database = DB_NAME;
	public $link;
	public $error;

	/**
	 *	Constructor 
	*/
	public function __construct()
	{
		$this->connect();
	}

	/**
	 *	Establish connection 
	*/
	private function connect()
	{
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->database);
		if (!$this->link) {
			$this->error = "Connection to database failed" . $this->link->error;
			return false;
		}
	}

	/**
	 * Select from db 
	*/
	public function select($sql)
	{
		$result = $this->link->query($sql) or die($this->link->error . __LINE__);
		if ($result->num_rows > 0) {
			return $result;
		}else{
			return false;
		}
	}

	/**
	 *	Insert into db 
	*/
	public function insert($sql)
	{
		$insert_row = $this->link->query($sql) or die($this->link->error . __LINE__);
		if ($insert_row) {
			header("Location: index.php?msg='".urlencode('Record added successfully!')."'");
		}else{
			die($this->link->error . __LINE__);
		}
	}

	/**
	 * Update a record
	*/
	public function update($sql)
	{
		$update_row = $this->link->query($sql) or die($this->link->error . __LINE__);
		if ($update_row) {
			header("Location: index.php?msg='".urlencode('Record updated successfully!')."'");
		}else{
			die($this->link->error . __LINE__);
		}
	}

	/**
	 *	Delete a record
	*/
	public function delete($sql)
	{
		$delete_row = $this->link->query($sql) or die($this->link->error . __LINE__);
		if ($delete_row) {
			header("Location: index.php?msg='".urlencode('Record deleted successfully!')."'");
		}else{
			die($this->link->error . __LINE__);
		}
	}
}	