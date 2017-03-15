<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function verifyUser($username, $password)
	{
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		//$row = mysqli_fetch_array($result);
		$row = $result->row_array();
		if($row)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function getUserList()
	{
		$sql = "SELECT * FROM accounts";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		//$row = mysqli_fetch_array($result);
		return $result->result_array();
	}

	public function findUser($id)
	{
		$sql = "SELECT * FROM accounts WHERE account_id=$id";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		//$row = mysqli_fetch_array($result);
		return $result->row_array();
		
	}

	public function addUser($username, $name, $type)
	{	

		$sql="select * from accounts where account_no='$username'";
		$ret=$this->db->query($sql);
		if( $ret->row_array()){
			return -1;
		}
		

		$sql = "INSERT INTO accounts VALUES (null, '$username', '$name', '$type',0,now())";


		//$result = mysqli_query($sql);
		$this->db->query($sql);
		return 1;
	}
	public function deposit($no,$amount)
	{	
		$sql="select * from accounts where account_no='$no'";
		$ret=$this->db->query($sql);
		if( !$ret->row_array()){
			return -1;
		}


		$sql = "UPDATE accounts SET balance=balance+$amount where account_no='$no'";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		return 1;
	}
	public function withdraw($no,$amount)
	{	
		$sql="select * from accounts where account_no='$no'";
		$ret=$this->db->query($sql);
		$row=$ret->row_array();
		if( !$row){
			return -1;
		}
		if($row['balance']<$amount){
			return -2;
		}



		$sql = "UPDATE accounts SET balance=balance-$amount where account_no='$no'";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		return 1;
	}
	public function transfer($from,$to,$amount)
	{	
		$sql="select * from accounts where account_no='$from'";
		$ret=$this->db->query($sql);
		$row=$ret->row_array();
		if( !$row){
			return -1;
		}
		if($row['balance']<$amount){
			return -2;
		}
		$sql="select * from accounts where account_no='$to'";
		$ret=$this->db->query($sql);
		$row=$ret->row_array();
		if( !$row){
			return -3;
		}



		$sql = "UPDATE accounts SET balance=balance-$amount where account_no='$from'";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);
		$sql = "UPDATE accounts SET balance=balance+$amount where account_no='$to'";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		return 1;
	}

	public function deleteUser($id)
	{
		$sql = "DELETE FROM accounts WHERE account_id=$id";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		//$row = mysqli_fetch_array($result);
		
	}




}