<?php include_once("db_connection.php");
include_once("./assets/templates/header.php") ?>
<?php
if (isset($_POST["TblUpdate"])) {
    echo "<h1>Pembaruan Data Produk</h1>";
    $db = OpenCon();
    if ($db->connect_errno == 0) {
        // Bersihkan data
        $nip = $db->escape_string($_POST["nip"]);
        $nama = $db->escape_string($_POST["nama"]);
        $tglLahir = $db->escape_string($_POST["tgl_lahir"]);
        $gender = $db->escape_string($_POST["gender"]);
        $alamat = $db->escape_string($_POST["alamat"]);
        $kota = $db->escape_string($_POST["kota"]);
        $tglMasuk = $db->escape_string($_POST["tgl_masuk"]);
        $jabatan = $db->escape_string($_POST["jabatan"]);
        $area = $db->escape_string($_POST["area"]);

        // Susun query insert
        $sql = "UPDATE pegawai SET
                nama='$nama',tgl_lahir='$tglLahir',gender='$gender',
                alamat='$alamat',kota='$kota', tgl_masuk='$tglMasuk',kode_jabatan='$jabatan',kode_area='$area'
                WHERE nip='$nip'";

        // Eksekusi query update
        $res = $db->query($sql);
        if ($res) {
            if ($db->affected_rows > 0) { // jika ada update data
?>
<div class="card-panel teal lighten-2 center-align">
    <h1 class="grey-text text-lighten-5">Data berhasil diupdate</h1>
</div>

<a class="waves-effect waves-light btn" href="index.php">View Produk</a>

<?php       } else{ ?>
<div class="card-panel teal lighten-2 center-align">
    <h1 class="grey-text text-lighten-5">Data berhasil diupdate tetapi tanpa ada perubahan data</h1>
</div>
<a class="waves-effect waves-light btn" href="index.php">View Produk</a>
<a class="waves-effect waves-light btn" href="javascript:history.back()">Edit Kembali</a>

<?php
            }
        }
    } else echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
}
include_once("./assets/templates/footer.php")
?>