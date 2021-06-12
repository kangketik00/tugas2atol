<?php
 include_once("function.php");
 include_once('./assets/templates/header.php');
?>

<a class="waves-effect waves-light btn" href="./index.php" role="button">Kembali Ke Beranda</a>
<h1>Tambah Data Produk</h1>

<div class="row">
    <div class="col s12 z-depth-1">
        <div class="form-container">
            <form method="post" name="frm" action="pegawai-simpan.php">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input name="nip" id="nip" type="text" class="validate" maxlength="6" required=""
                            aria-required="true">
                        <label for="nip">NIP</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="nama" id="nama" type="text" class="validate" required="" aria-required="true">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="password" id="password" type="password" class="validate" required=""
                            aria-required="true">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="tgl_lahir" type="text" class="datepicker" placeholder="Tanggal lahir" required=""
                            aria-required="true">
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="gender" required="" aria-required="true">
                            <option value="" disabled selected>Gender</option>
                            <option value="p">Pria</option>
                            <option value="w">Wanita</option>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="alamat" type="text" class="validate" id="alamat" required=""
                            aria-required="true" />
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="kota" id="kota" type="text" class="validate" required="" aria-required="true">
                        <label for="kota">Kota</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input name="tgl_masuk" type="text" class="datepicker" placeholder="Tanggal Masuk" required=""
                            aria-required="true">
                    </div>
                    <div class="input-field col s12 m4">
                        <select name="jabatan" required="" aria-required="true">
                            <option value="" disabled selected>Jabatan</option>
                            <?php
                                $dataJabatan = getListJabatan();
                                foreach ($dataJabatan as $data) {
                                    echo "<option value=\"" . $data["kode_jabatan"] . "\">" . $data["nama_jabatan"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s12 m4">
                        <select name="area" required="" aria-required="true">
                            <option value="" disabled selected>Area</option>
                            <?php
                                $dataJabatan = getListArea();
                                foreach ($dataJabatan as $data) {
                                    echo "<option value=\"" . $data["kode_area"] . "\">" . $data["nama_area"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <button name="TblSimpan" class="btn waves-effect waves-light" type="submit">Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<?php include_once('./assets/templates/footer.php') ?>