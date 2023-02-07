<?php
require "../database/connection.php";
require "controller.php";

include "API/get-sliders.php";
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Slider</title>
</head>

<body data-alpino="theme-cyan">

    <?php include "utility/header.php" ?>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header d-flex justify-content-between">
                            <h2><strong>Healthtrack Admin |</strong> Slider</h2>

                            <a href="add-new-slider.php" class="btn btn-primary"> <strong>Yeni Ekle</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>Gönderilen Sayfa</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($sliderResult as $singleSlider) { ?>
                                            <tr class="slider-<?= $singleSlider->slider_id ?>">
                                                <td><?= $singleSlider->title ?></td>
                                                <td><a href="<?= $singleSlider->slider_link ?>" target = "_blank"><?= $singleSlider->slider_link ?></a></td>
                                                <td class="text-center"><a href="slider-details.php?nid=<?= $singleSlider->slider_id ?>" class="btn btn-info">DÜZENLE</a></td>
                                                <td class="text-center"><button class="btn btn-danger sliderDeleteBtn" slider-id="<?= $singleSlider->slider_id ?>">SİL</button></td>
                                            </tr>
                                        <?php }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>
    <!-- Delete Slider -->
    <script>
        $(document).on('click', '.sliderDeleteBtn', function() {
            event.preventDefault();
            var sliderID = $(this).attr("slider-id");

            Swal.fire({
                title: "Slider'ı silmek istediğinize emin misiniz?",
                text: "Not: Geri dönüşü olmayacaktır. Tekrar eklemek zorunda kalabilirsiniz.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#18ce0f",
                cancelButtonColor: "#FF3636",
                confirmButtonText: 'Evet, eminim!',
                cancelButtonText: 'Vazgeç',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "API/delete-slider.php",
                        type: "POST",
                        data: {
                            sliderID: sliderID
                        },
                        cache: false,
                        dataType: "json",
                        success: function(data) {
                            if (data.status == true) {
                                $(".slider-" + sliderID).fadeOut('slow');
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                                setInterval(reloadHandler, 3500)
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            }

                        }
                    });
                }
            })
        });
    </script>

</body>

</html>