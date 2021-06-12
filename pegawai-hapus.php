<?php
include_once("db_connection.php");
include_once("./assets/templates/header.php");
?>
<?php
if(isset($_POST["TblHapus"])){
	$db = OpenCon();
	if($db->connect_errno==0){
		$nipPegawai  =$db->escape_string($_POST["nipPegawai"]);
		// Susun query delete
		$sql="DELETE FROM pegawai WHERE nip='$nipPegawai'";
		// Eksekusi query delete
		$res=$db->query($sql);
		if ($res) {
            if ($db->affected_rows > 0) { // jika ada update data
?>
<div class="card-panel teal lighten-2 center-align">
    <h1 class="grey-text text-lighten-5">Data berhasil dihapus</h1>
</div>
<script type="text/javascript">
</script>
<?php       } else{ ?>
<div class="card-panel teal lighten-2 center-align">
    <h1 class="grey-text text-lighten-5">Penghapusan gagal karena data yang dihapus tidak ada</h1>
</div>

<?php
            }
        } else {
        ?>
<div class="card-panel red lighten-1 center-align">
    <h1 class="grey-text text-lighten-5">Data gagal dihapus!</h1>
</div>
<?php
        }
    } else echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
}
?>
<a class="btn waves-effect waves-green" href="index.php">View Produk</a>
<?php
include_once("./assets/templates/footer.php")
?>