<?php
require "../database/connection.php";
require "controller.php";

if (isset($_GET["sid"])) {
    $urlSliderID = $_GET["sid"];
    include "API/get-slider-with-id.php";
} else {
    header("Location: sliders.php");
}



// $filteredSliderLangCodeArray
?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Slider Düzenle</title>
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
                            <h2><strong>Healthtrack Admin | </strong>Slider Düzenle</h2>
                        </div>
                        <ul class="nav nav-tabs">
                            <?php
                            foreach ($allLangResult as $singleLangResult) { ?>

                                <li class="nav-item">
                                    <a class="nav-link nav-tab-lang <?php if ($singleLangResult === reset($allLangResult)) echo "active"; ?>" data-bs-toggle="tab" lang-data="<?= $singleLangResult->main_code ?>" href="#lang-<?= $singleLangResult->main_code ?>"><?= $singleLangResult->name ?></a>
                                </li>
                            <?php  }
                            ?>

                        </ul>




                        <form id="updateSliderForm" name="updateSliderForm" method="POST" enctype="multipart/form-data">
                            <div class="tab-content">
                                <?php foreach ($allLangResult as $singleLangResult) { ?>
                                    <div role="tabpanel" class="body tab-pane <?php if ($singleLangResult === reset($allLangResult)) echo "in active"; ?>" id="lang-<?= $singleLangResult->main_code ?>">

                                        <?php
                                        $sliderResultCount = count($sliderIDQueryResult);
                                        for ($i = 0; $i < $sliderResultCount; $i++) {
                                            if (in_array($singleLangResult->main_code, $filteredSliderLangCodeArray)) {
                                                if ($sliderIDQueryResult[$i]->language_code == $singleLangResult->main_code) {
                                                    # code...

                                        ?>

                                                    <!-- Slider Title -->
                                                    <label for="sliderTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Başlık <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <input type="text" id="sliderTitle-<?= $singleLangResult->main_code ?>" name="sliderTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Başlık" value="<?= $sliderIDQueryResult[$i]->title ?>">
                                                    </div>

                                                    <!-- Slider Short Content -->
                                                    <label for="sliderShortContent-<?= $singleLangResult->main_code ?>" class="mb-1">Kısa Açıklama <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <textarea type="text" id="sliderShortContent-<?= $singleLangResult->main_code ?>" name="sliderShortContent-<?= $singleLangResult->main_code ?>" class="form-control" rows="3" placeholder="Kısa İçerik (İçeriği anlatan cümleler)"><?= $sliderIDQueryResult[$i]->content ?></textarea>
                                                    </div>

                                                    <!-- Slider Link -->
                                                    <label for="sliderLink-<?= $singleLangResult->main_code ?>" class="mb-1">Yönlendirilecek Link <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <input type="text" id="sliderLink-<?= $singleLangResult->main_code ?>" name="sliderLink-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Link" aria-describedby="linkHelp" value="<?= $sliderIDQueryResult[$i]->slider_link ?>">
                                                        <small for="linkHelp">* Yönlendirilecek Link bütün diller için ortaktır.</small>
                                                    </div>
                                                <?php
                                                    break;
                                                }
                                            } else {   ?>
                                                <!-- Slider Title -->
                                                <label for="sliderTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Başlık <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="sliderTitle-<?= $singleLangResult->main_code ?>" name="sliderTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Başlık">
                                                </div>

                                                <!-- Slider Short Content -->
                                                <label for="sliderShortContent-<?= $singleLangResult->main_code ?>" class="mb-1">Kısa Açıklama <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" id="sliderShortContent-<?= $singleLangResult->main_code ?>" name="sliderShortContent-<?= $singleLangResult->main_code ?>" class="form-control" rows="3" placeholder="Kısa İçerik (İçeriği anlatan cümleler)"></textarea>
                                                </div>

                                                <!-- Slider Link -->
                                                <label for="sliderLink-<?= $singleLangResult->main_code ?>" class="mb-1">Yönlendirilecek Link <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="sliderLink-<?= $singleLangResult->main_code ?>" name="sliderLink-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Link" aria-describedby="linkHelp" value="<?= $sliderIDQueryResult[0]->slider_link ?>">
                                                    <small for="linkHelp">* Yönlendirilecek Link bütün diller için ortaktır.</small>
                                                </div>

                                        <?php
                                                break;
                                            }
                                        }
                                        ?>
                                        <!-- Slider Image -->
                                        <!-- <label for="sliderImage" class="mb-1">Slider Fotoğrafı <span class="text-danger">(*)</span></label>
                                        <div class="form-group mb-2">
                                            <input type="file" class="form-control-file" id="sliderImage" name="sliderImage" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                            <small for="fileHelp">Fotoğraf türü JPG veya PNG olmalıdır. Güncellenmesini istemiyorsanız lütfen fotoğraf seçmeyiniz.</small>
                                        </div> -->

                                        <div style="text-align: right !important">

                                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">GÜNCELLE</button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <input type="text" class="d-none" id="idHolderInput" name="idHolderInput" value="<?= $urlSliderID ?>" readonly>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>


    <!-- Update Slider -->
    <script>
        var langDataHolder = "<?= $defaultLangResult[0]->code ?>";
        $(".nav-tab-lang").on('click', function() {
            langDataHolder = $(this).attr("lang-data")
        });

        $('#updateSliderForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            Swal.fire({
                title: "Slider'ı güncellemek istediğinize emin misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $data.append("langDataHolder", langDataHolder);
                    $.ajax({
                        url: "API/update-slider.php",
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