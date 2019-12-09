<?php

class Database{

	private $connection;

	function __construct()
	{
		$this->connect_db();
	}

	public function connect_db(){
		$this->connection = mysqli_connect('localhost', 'root', '', 'sekolah');
		if(mysqli_connect_error()){
			die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
		}
	}

	public function create($nama_depan,$nama_belakang,$alamat){
		$sql = "INSERT INTO siswa (nama_depan, nama_belakang, alamat) VALUES ('$nama_depan', '$nama_belakang', '$alamat')";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	}

	public function read($id=null){
		$sql = "SELECT * FROM siswa";
		if($id){ $sql .= " WHERE id=$id";}
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}

	public function update($nama_depan,$nama_belakang,$alamat, $id){
	$sql = "UPDATE siswa SET nama_depan='$nama_depan', nama_belakang='$nama_belakang',
   alamat='$alamat' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

}


$database = new Database();

?>
