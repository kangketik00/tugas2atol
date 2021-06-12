<?php include_once('./assets/templates/header.php') ?>

<h1>Data Pegawai</h1>
<!-- Content here -->
<?php
include_once("db_connection.php");
$db = OpenCon();
if ($db->connect_errno == 0) {
    $sql = "SELECT p.nip,p.nama,p.tgl_lahir, p.gender, p.alamat, j.nama_jabatan, a.nama_area, j.gaji_pokok
    FROM pegawai p JOIN jabatan j ON p.kode_jabatan=j.kode_jabatan
    JOIN area a ON p.kode_area=a.kode_area
    WHERE nip <> 'admin'";
    $res = $db->query($sql);
    if ($res) {
        $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
?>
<a class="waves-effect waves-light btn " href="./pegawai-form-tambah.php" role="button">Tambah Data</a>
<a class="waves-effect waves-light btn " href="./pegawai-view-cari.php" role="button">Cari Pegawai</a>
<div id="pegawai-view">
    <table class="striped">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>Gender</th>
                <th>alamat</th>
                <th>Jabatan</th>
                <th>Area</th>
                <th>Gaji Pokok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $barisdata) { // telusuri satu per satu ?>
            <tr>
                <td><?= $barisdata["nip"];?></td>
                <td><?= $barisdata["nama"];?></td>
                <td><?= $barisdata["tgl_lahir"];?></td>
                <td><?= $barisdata["gender"];?></td>
                <td><?= $barisdata["alamat"];?></td>
                <td><?= $barisdata["nama_jabatan"];?></td>
                <td><?= $barisdata["nama_area"];?></td>
                <td><?= $barisdata["gaji_pokok"];?></td>
                <td>
                    <a class="waves-effect waves-light btn" href="pegawai-form-edit.php?nip=<?= $barisdata["nip"]; ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- <a class="waves-effect waves-light btn modal-trigger btn red" href="#modalDelete"
                    data-nip="<?= $barisdata["nip"];?>">
                    <i class="far fa-trash-alt"></i>
                </a> -->
                    <button onclick="handlingModalDelete(event)" data-nip="<?= $barisdata["nip"]; ?>"
                        data-target="modalDelete" class="btn modal-trigger red"><i
                            class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- Modal Structure -->
<div id="modalDelete" class="modal modal-custom">
    <div class="modal-content">
        <h4>Hapus Data Pegawai</h4>
        <p>Apakah anda yakin untuk menghapus data pegawai?</p>
        <form method="post" name="frm" action="pegawai-hapus.php">
            <input name="nipPegawai" type="hidden" id="delete-nip">
            <a href="#!" class="modal-close btn waves-effect waves-green ">Batal</a>
            <button name="TblHapus" class="btn waves-effect waves-red red " type="submit">Ya
            </button>
        </form>
    </div>
</div>

<?php
        $res->free();
    } else echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
} else echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
?>
</div>

<?php include_once('./assets/templates/footer.php') ?>