<?php
require "../database/connection.php";

if (isset($_COOKIE["loginController"]) && $_COOKIE["loginController"] == "1") {
    header("location: index.php");
}

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">

    <title>Healthtrack Admin | Giriş Yap</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/img/logo_cyan.png" type="image/x-icon">


    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/main.css">

</head>

<body data-alpino="theme-cyan">
    <div class="authentication">
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card-plain">
                            <img src="assets/img/logo_black.png" alt="" style="width: 70px !important;">

                            <div class="header mb-5 mt-3">
                                <h4> <b>HEALTHTRACK ADMIN</b> </h4>
                            </div>
                            <form class="form" id="loginForm" name="loginForm">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="userMailInput" name="userMailInput" placeholder="E-posta Adresi" required="">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>

                                <div class="input-group mt-3">
                                    <input type="password" placeholder="Şifre" class="form-control" id="userPasswordInput" name="userPasswordInput" required="">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                                <div class="checkbox">
                                    <input id="rememberMe" name="rememberMe" type="checkbox">
                                    <label for="rememberMe">Beni Hatırla</label>
                                </div>

                                <div class="footer mt-4 mb-3">
                                    <button type="submit" class="btn btn-primary btn-round btn-block loginBtn"><b>GİRİŞ YAP</b></button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert Plugin Js -->

    <script>
        $("#loginForm").submit(function(event) {
            event.preventDefault();

            var $data = new FormData(this);

            $.ajax({
                url: "API/login-action",
                type: "POST",
                contentType: false,
                processData: false,
                cache: false,
                dataType: "json",
                data: $data,
                success: function(data) {
                    if (data.status == false) {
                        console.log("Error")
                        Swal.fire({
                            position: 'top-start',
                            icon: 'warning',
                            title: data.errors.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        setInterval(reloadFunc, 3000)
                        Swal.fire({
                            position: 'top-start',
                            icon: 'success',
                            title: data.successful,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        function reloadFunc() {
                            location.href = "index.php";
                        }
                    }

                }
            });
        });
    </script>
</body>

</html>