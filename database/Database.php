<?php
class Database {
	protected $_link, $_result, $_numRows;
	
	public function __construct($server, $username, $password, $db){
		$this->_link = mysql_connect($server, $username, $password);
		mysql_select_db($dbm $this->_link);
	}
	
	public function disconnect() {
		mysql_close($this _link);
	}
	
	public function query($sql){
		$this->_result  = mysql_query($sql, $this->_link);
		$this->_numRows = mysql_num_rows($this->_result);
	}
	
	public function numRows() {
		return $this->_numRows;
	}
	
	public function rows(){
		//PHP for Absolute Beginners
		//Video Lecture 52: MySQL Database Example Part 3
		
	}
}