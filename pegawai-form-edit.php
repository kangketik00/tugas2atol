<?php
 include_once("function.php");
 include_once('./assets/templates/header.php');
 if (isset($_GET["nip"])) {
    $db = OpenCon();
    $nip = $db->escape_string($_GET["nip"]);
    if ($dataPegawai = getDataPegawai($nip)) {
    // cari data produk, kalau ada simpan di $dataproduk
?>

<a class="waves-effect waves-light btn" href="./index.php" role="button">Kembali Ke Beranda</a>
<h1>Update Data Pegawai</h1>

<div class="row">
    <div class="col s12 z-depth-1">
        <div class="form-container">
            <form method="post" name="frm" action="pegawai-update.php">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input value="<?= $dataPegawai['nip']?>" name="nip" id="nip" type="text" class="validate"
                            maxlength="6" readonly>
                        <label for="nip">NIP</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input value="<?= $dataPegawai['nama']?>" name="nama" id="nama" type="text" class="validate">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input value="<?= $dataPegawai['tgl_lahir']?>" name="tgl_lahir" type="text" class="datepicker"
                            placeholder="Tanggal lahir">
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="gender">
                            <option value="" disabled>Gender</option>
                            <option value="p" <?= $dataPegawai['gender']='p'?"selected":""; ?>>Pria</option>
                            <option value="w" <?= $dataPegawai['gender']='w'?"selected":""; ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <input value="<?= $dataPegawai['alamat']?>" name="alamat" type="text" class="validate"
                            id="alamat" />
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input value="<?= $dataPegawai['kota']?>" name="kota" id="kota" type="text" class="validate">
                        <label for="kota">Kota</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input value="<?= $dataPegawai['tgl_masuk']?>" name="tgl_masuk" type="text" class="datepicker"
                            placeholder="Tanggal Masuk">
                    </div>
                    <div class="input-field col s12 m4">
                        <select name="jabatan">
                            <option value="" disabled selected>Jabatan</option>
                            <?php
                                $dataJabatan = getListJabatan();
                                foreach ($dataJabatan as $data) {
                                    echo "<option value=\"" . $data["kode_jabatan"] . "\"";
                                    if ($data["kode_jabatan"] == $dataPegawai["kode_jabatan"]) echo " selected"; // default sesuai jabatan sebelumnya
                                    echo ">" . $data["nama_jabatan"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s12 m4">
                        <select name="area">
                            <option value="" disabled selected>Area</option>
                            <?php
                                $dataJabatan = getListArea();
                                foreach ($dataJabatan as $data) {
                                    echo "<option value=\"" . $data["kode_area"] . "\"";
                                    if ($data["kode_area"] == $dataPegawai["kode_area"]) echo " selected"; // default sesuai jabatan sebelumnya
                                    echo ">" . $data["nama_area"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <button name="TblUpdate" class="btn waves-effect waves-light" type="submit">Update
                </button>
            </form>
        </div>
    </div>
</div>

<?php
    } else {
    ?>
<div class="card-panel red lighten-1 center-align">
    <h1 class="grey-text text-lighten-5"> <?= "Pegawai dengan NIP : $nip tidak ada. Pengeditan dibatalkan";?></h1>
</div>
<a class="waves-effect waves-light btn" href="index.php">Kembali</a>
<?php
 }
} else {
?>
<div class="card-panel red lighten-1 center-align">
    <h1 class="grey-text text-lighten-5">NIP Pegawai tidak ada. Pengeditan dibatalkan</h1>
</div>
<a class="waves-effect waves-light btn" href="index.php">Kembali</a>
<?php
}
include_once('./assets/templates/footer.php')
?>