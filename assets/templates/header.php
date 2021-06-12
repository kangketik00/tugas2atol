<?php
	session_start();
	if(!isset($_SESSION["nipPegawai"]))
		header("Location: pegawai-form-login.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="./assets/styles/main.css" rel="stylesheet">
    <title>OurDealer</title>
    <script src="https://kit.fontawesome.com/509edfb62c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <div class="greeting">
                <p>Selamat Datang, <?= $_SESSION['nama'] ?></p>
            </div>
            <a class="btn waves-effect waves-light btn-flat white-text" href="pegawai-logout.php">Logout</a>
        </div>
    </nav>
    <div class="container">