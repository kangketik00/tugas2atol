<?php
include_once("db_connection.php");
$db = OpenCon();
if($db->connect_errno==0){
	if(isset($_POST["TblLogin"])){
		$nip = $db->escape_string($_POST["nip"]);
        $password = md5($db->escape_string($_POST["password"]));
        // $password = $db->escape_string($_POST["password"]);

		$sql="SELECT nip, nama FROM pegawai
			  WHERE nip='$nip' and password='$password'";
		$res=$db->query($sql);
		if($res){
			if($res->num_rows==1){
				$data=$res->fetch_assoc();
				session_start();
				$_SESSION["nipPegawai"]=$data["nip"];
				$_SESSION["nama"]=$data["nama"];
				header("Location: index.php");
			}
			else
				header("Location: pegawai-form-login.php?error=1");
		}
	}
	else
		header("Location: pegawai-form-login.php?error=2");
}
else
	header("Location: pegawai-form-login.php?error=3");

$nip = $db->escape_string($_POST["nip"]);
$password = $db->escape_string($_POST["password"]);
var_dump($password)
?>