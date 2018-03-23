<?php
class helper
{
	private $con;
	function __construct()
	{
		$this->con = new mysqli("localhost","root","12345","ceryx");
	}

	function __destruct()
	{
		@$this->con->close();
	}
	
	// other functions
	
	/* insert() function for inserting records in db */
	function insert($table,$fields,$values)
	{	
		$str = "insert into $table($fields) values($values)";
		$this->con->query($str) or die($this->con->error);
	}
	
	/* delete() function for deleting records from db */
	function delete($table,$condition)
	{
		// delete from tablename where condition
		$str = "delete from $table where $condition";
		$this->con->query($str) or die($this->con->error);
	}
	
	/* execute() function for updating records in db */
	function execute($str)
	{
		$this->con->query($str) or die($this->con->error);
	}
	
	function select($field,$table,$condition)
	{
		$str = "select $field from $table where $condition ";
		 //echo $str;
		$result = $this->con->query($str) or die($this->con->error);
		$data=[];
		if($result->num_rows>0) // if empty records
		{
				
			while($row = $result->fetch_array()) 
			{
				$data[] = $row; /* saving the result 
								in two dimensional array */
			}
			
		}
		return $data;
	}
    
    function select_count($field,$table,$condition)
	{
		$str = "select $field from $table where $condition";
		$result = $this->con->query($str) or die($this->con->error);
		
		if($result->num_rows==0) // if empty records
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function test()
	{
		return $this->con;
	}
}

$obj = new helper();

?>