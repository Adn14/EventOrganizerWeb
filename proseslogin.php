<?php
session_start();
$username = $_POST['nama'];
$password = $_POST['pass'];
$server = "localhost";
$db = "event";
$user = "root";
$pass = "";
$koneksi = mysqli_connect($server,$user,$pass,$db);

if(!$koneksi){
	die("Koneksi gagal dilakukan".mysql_error());
}

$query = "SELECT * FROM member WHERE id_member='".$username."'";
$result = mysqli_query($koneksi, $query);

if($result){
	$row = mysqli_fetch_row($result);
	if($row[4] == $password and $row[0] == $username and $row[7] == 1){
		$_SESSION['nama'] = $username;
		echo "LOGIN Sukses";
		header("location:admin.php");
	}
	else{
		echo "Nama / Password salah, silahkan input kembali <br>";
		echo "<a href=formlogin.php><button>Back</button></a>";
	}
}

?>