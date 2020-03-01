<?php 
	/**
	 * DataBase connection
	 */
	class Data_base_connection
	{
		private $dbHost     = "localhost";
	    private $dbUsername = "root";
	    private $dbPassword = "mukul7264";
	    private $dbName     = "tdata2";

		function content(){
            // Connect to the database
           return new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
	    }
	}
	$db = new Data_base_connection();
	$connection = $db->content();

	function escape($string){
		global $connection;
		return mysqli_real_escape_string($connection, trim($string));
	}
 ?>

 