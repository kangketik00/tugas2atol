<?php include_once("db_connection.php");
include_once("./assets/templates/header.php") ?>

<?php
if (isset($_POST["TblSimpan"])) {
    $db = OpenCon();
    if ($db->connect_errno == 0) {
        // Bersihkan data
        $nip = $db->escape_string($_POST["nip"]);
        $nama = $db->escape_string($_POST["nama"]);
        $password = md5($db->escape_string($_POST["password"]));
        $tglLahir = $db->escape_string($_POST["tgl_lahir"]);
        $gender = $db->escape_string($_POST["gender"]);
        $alamat = $db->escape_string($_POST["alamat"]);
        $kota = $db->escape_string($_POST["kota"]);
        $tglMasuk = $db->escape_string($_POST["tgl_masuk"]);
        $jabatan = $db->escape_string($_POST["jabatan"]);
        $area = $db->escape_string($_POST["area"]);


        // Susun query insert
        $sql = "INSERT INTO pegawai(nip,nama,password,tgl_lahir,gender,alamat,kota,tgl_masuk,kode_jabatan,kode_area)
        VALUES('$nip','$nama','$password','$tglLahir','$gender',
        '$alamat','$kota','$tglMasuk','$jabatan','$area')";

        // Eksekusi query insert
        $res = $db->query($sql);
        if ($res) {
            if ($db->affected_rows > 0) { // jika ada penambahan data
?>
<div class="card-panel teal lighten-2 center-align">
    <h1 class="grey-text text-lighten-5">Data berhasil disimpan</h1>
</div>
<a class="waves-effect waves-light btn" href="index.php">View Produk</a>
<?php
            }
        } else {
        ?>
<div class="card-panel red lighten-1 center-align">
    <h1 class="grey-text text-lighten-5"> Data gagal disimpan karena NIP mungkin sudah ada!</h1>
</div>
<a class="waves-effect waves-light btn" href="javascript:history.back()">Kembali</a>
<?php
        }
    } else echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
}
include_once("./assets/templates/footer.php")
?>