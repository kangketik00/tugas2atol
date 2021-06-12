<?php
    define("DEVELOPMENT", false); // menyatakan situs masih dalam pengambangan
    function OpenCon(){
        $dbhost = "localhost";
        $dbuser = DEVELOPMENT ? "root": "ranaumyi_minr";
        $dbpass = DEVELOPMENT ? "" : "@Ranau27!";
        $db = DEVELOPMENT ? "pegawai_db" : "ranaumyi_pegawaidb";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        return $conn;
    }