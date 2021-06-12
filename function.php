<?php
include_once("db_connection.php");

function getListArea(){
    $db = OpenCon();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM area ORDER BY kode_area");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else return FALSE;
    } else return FALSE;
}

function getListJabatan(){
    $db = OpenCon();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM jabatan");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else return FALSE;
    } else return FALSE;
}

function getDataPegawai($nip){
    $db = OpenCon();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT p.nip, p.nama, p.tgl_lahir, p.gender, p.alamat, p.kota, p.tgl_masuk,j.kode_jabatan, a.kode_area
                            FROM pegawai p JOIN jabatan j ON p.kode_jabatan=j.kode_jabatan
                            JOIN area a ON p.kode_area=a.kode_area WHERE p.nip=$nip");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else return FALSE;
        } else return FALSE;
    } else return FALSE;
}

function showError($message){
?>
<div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
    <?php echo $message;?>
</div>
<?php
}