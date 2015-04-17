<?php
class Database {
	protected $conn, $_result, $_numRows;
	
	public function __construct($server, $username, $password, $db){
		global $conn;
		$conn = mysqli_connect($server, $username, $password, $db);
		if(!$conn){
			die("Connection Failed: ".mysqli_connect_error());
		}
		//echo "Connected Successfully<br/>";
	}
	
	public function disconnect() {
		mysql_close($conn);
	}
	
	public function querySimple($col, $from, $where){
		global $conn;
		$sql = "SELECT ".$col." FROM ".$from." WHERE ".$where.";";
		//return $sql;
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			while($row = mysqli_fetch_assoc($result)){
				//echo $row[$col];
				$resultArray = $row;
			}
		} else {
			return "0 results";
		}
		return $resultArray;
	}

	public function query($sql){
		global $conn;
		//echo $sql;
		
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row["course_number"]."</td>
						  <td>".$row["course_title"]."</td>
						  <td>".$row["contact_hours"]."</td>
						  <td>".$row["credits"]."</td>
						  <td>".$row["schedule_days"]."</td>
						  <td>".$row["taxonomy"]."</td>
					  </tr>";
			}
		} else {
			echo "0 results";
		}
	}

	public function querySingle($col, $where){
		global $conn;
		$sql = "SELECT ".$col." FROM classes WHERE course_number ='".$where."';";
		//echo $sql;
		$item ="";
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			while($row = mysqli_fetch_assoc($result)){
				//echo $row[$col];
				return $row[$col];
			}
		} else {
			echo "0 results";
		}
	}

	public function queryFiles(){
		global $conn;
		$sql = "SELECT course_title, course_number FROM classes;";
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			while($row = mysqli_fetch_assoc($result)){
				//echo $row['course_title'];
				echo '<button type="submit" class="list-group-item" value="'.$row["course_number"].'" name="classNumber" style="width:100%;">'.$row["course_title"].'</button><br/>';
			}
		} else {
			echo "0 results";
		}
	}

	public function queryArray($col, $where){
		global $conn;
		$sql = "SELECT ".$col." FROM classes WHERE course_number ='".$where."';";
		//echo $sql;
		if(!$conn){
			echo "Boo No Connection!";
		}
		$item = "";
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			while($row = mysqli_fetch_assoc($result)){
				return $row[$col];
				//echo $row['additional_items'];
				//$item = $row;
			}
		} else {
			echo "0 results";
		}
		//return $row['additional_items'];
	}

	public function queryProfile($col, $where){
		global $conn;
		$sql = "SELECT ".$col." FROM profiles WHERE id='".$where."';";
		//echo $sql;
		
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			while($row = mysqli_fetch_assoc($result)){
				echo $row[$col];
			}
		} else {
			echo "0 results";
		}
		//return $row = mysqli_fetch_assoc($result);
	}

	public function update($table, $items, $where){
		global $conn;
		$sql = "UPDATE ".$table." SET ".$items." WHERE ".$where.";";
		if(mysqli_query($conn, $sql)){
			//echo "$sql";
		}else {
			echo "Error updating Record: ".mysqli_error($conn)."<br/>";
			echo "$sql";
		}

	}

	public function isDifferent(){
		global $conn;
	}

	public function isRecord($email, $password){
		global $conn;
		$sql = "SELECT email, password FROM login WHERE email='$email' AND password='$password';";
		if(mysqli_query($conn, $sql)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function insert($classes, $insertItems){
		global $conn;
		//echo $insertItems."<br />";
		$sql = "INSERT INTO classes(".$classes.")
				VALUES(".$insertItems.");";
		/*if(!isset($insertItems)){
			echo "Not Added";
		}else */
		if(mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>alert('New record created');</script>";
		}else{
			echo mysqli_error($conn);
		}
	}
	
	public function numRows() {
		return $this->_numRows;
	}
}
?>