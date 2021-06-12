<?php
session_start();
session_destroy();
header("Location: pegawai-form-login.php");