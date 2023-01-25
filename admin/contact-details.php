<?php
require "../database/connection.php";
require "controller.php";

if (isset($_GET["cid"])) {
    $urlContactID = $_GET["cid"];

    include "API/get-contact-with-id.php";
} else {
    header("Location: contact.php");
}

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | İletişim Bilgisini Düzenle</title>
</head>

<body data-alpino="theme-cyan">

    <?php include "utility/header.php" ?>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Healthtrack Admin | </strong>İletişim Bilgisini Düzenle</h2>
                        </div>
                        <div class="body">
                            <form id="updateContactForm" name="updateContactForm" method="POST" enctype="multipart/form-data">

                                <!-- Contact Type -->
                                <label for="contactType" class="mb-1">İletişim Bilgisi Türü <span class="text-danger">(*)</span></label>
                                <div class="form-group select-set mb-3">
                                    <select class="form-select" id="contactType" name="contactType">
                                        <option value="" class="d-none">Seçiniz</option>
                                        <option value="Telefon" <?php if ($contactQueryIDResult[0]->contact_type == "Telefon") echo 'selected' ?>>Telefon</option>
                                        <option value="E-mail" <?php if ($contactQueryIDResult[0]->contact_type == "E-mail") echo 'selected' ?>>E-mail</option>
                                        <option value="Adres" <?php if ($contactQueryIDResult[0]->contact_type == "Adres") echo 'selected' ?>>Adres</option>
                                    </select>
                                </div>

                                <!-- Contact Content -->
                                <label for="contactContent" class="mb-1">İletişim Bilgisi İçeriği <span class="text-danger">(*)</span></label>
                                <div class="form-group mb-3">
                                    <input type="text" id="contactContent" name="contactContent" class="form-control" placeholder="İletişim Bilgisi İçeriği" value="<?= $contactQueryIDResult[0]->contact_content ?>">
                                </div>


                                <div style="text-align: right !important">
                                    <input type="text" class="d-none" name="idHolderInput" id="idHolderInput" value="<?= $urlContactID ?>">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">GÜNCELLE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>


    <!-- Update Contact -->
    <script>
        $('#updateContactForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            Swal.fire({
                title: 'İletişim bilgisini güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/update-contact.php",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: "json",
                        data: $data,
                        success: function(data) {
                            if (data.status == false) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data.errors.error,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.success,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                                setInterval(reloadHandler, 3500);

                            }
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>