<?php
require "../database/connection.php";
require "controller.php";
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Yeni Haber Ekle</title>
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
                            <h2><strong>Healthtrack Admin | </strong>Yeni Haber Ekle</h2>
                        </div>
                        <div class="body">
                            <form id="newNewsForm" name="newNewsForm" method="POST" enctype="multipart/form-data">

                                <!-- Language -->
                                <label for="defaultLanguage" class="mb-1">Site Ana Dili</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" value="<?= $defaultLangResult[0]->name ?>" aria-describedby="langHelp" readonly>
                                    <small for="langHelp">
                                        <span class="text-info">Bilgilendirme: Sitenin ana dili <?= $defaultLangResult[0]->name ?> olarak belirlenmiştir.
                                            Sitede bulunan diğer dillere ekleme yapmak için ana dilde eklemeniz gerekmektedir.
                                            Daha sonrasında düzenleme kısmından diğer diller için düzenleme yapabilirsiniz. </span>
                                    </small>
                                </div>

                                <!-- News Title -->
                                <label for="newsTitle" class="mb-1">Başlık <span class="text-danger">(*)</span></label>
                                <div class="form-group mb-3">
                                    <input type="text" id="newsTitle" name="newsTitle" class="form-control" placeholder="Başlık">
                                </div>

                                <!-- News Short Content -->
                                <label for="newsShortContent" class="mb-1">Kısa İçerik <span class="text-danger">(*)</span></label>
                                <div class="form-group mb-3">
                                    <textarea type="text" id="newsShortContent" name="newsShortContent" class="form-control" rows="3" placeholder="Kısa İçerik (İçeriği anlatan cümleler veya içerikten bir kısım)"></textarea>
                                </div>

                                <!-- News Content -->
                                <label for="ckeditorNewsContent" class="mb-1">İçerik <span class="text-danger">(*)</span></label>
                                <div class="form-group mb-3">
                                    <textarea id="ckeditorNewsContent" name="ckeditorNewsContent"></textarea>
                                </div>

                                <!-- News Image -->
                                <label for="newsImage" class="mb-1">Kapak Fotoğrafı <span class="text-danger">(*)</span></label>
                                <div class="form-group mb-2">
                                    <input type="file" class="form-control-file" id="newsImage" name="newsImage" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                    <small for="fileHelp">Fotoğraf türü JPG veya PNG olmalıdır.</small>
                                </div>

                                <div style="text-align: right !important">
                                    <input type="text" id="defaultLanguage" name="defaultLanguage" class="d-none" value="<?= $defaultLangResult[0]->code ?>">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">EKLE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>

    <script>
        $(function() {
            //CKEditor
            CKEDITOR.replace('ckeditorNewsContent');
            CKEDITOR.config.height = 500;
        });
    </script>

    <!-- New News -->
    <script>
        $('#newNewsForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var ckeditorNewsContent = CKEDITOR.instances['ckeditorNewsContent'].getData();

            $data.append("newsContent", ckeditorNewsContent);

            Swal.fire({
                title: 'Haberi eklemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/create-news.php",
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