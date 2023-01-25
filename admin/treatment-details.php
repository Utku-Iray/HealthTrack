<?php
require "../database/connection.php";
require "controller.php";

if (isset($_GET["tid"])) {

    $treatmentID = $_GET["tid"];

    include "API/get-treatment-with-id.php";
} else {
    header("Location: treatments.php");
}



?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Tedavi Düzenle</title>
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
                            <h2><strong>Healthtrack Admin | </strong>Tedavi Düzenle</h2>
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




                        <form id="updateTreatmentForm" name="updateTreatmentForm" method="POST" enctype="multipart/form-data">
                            <div class="tab-content">
                                <?php foreach ($allLangResult as $singleLangResult) { ?>
                                    <div role="tabpanel" class="body tab-pane <?php if ($singleLangResult === reset($allLangResult)) echo "in active"; ?>" id="lang-<?= $singleLangResult->main_code ?>">

                                        <?php
                                        $treatmentsResultCount = count($treatmentsResult);
                                        for ($i = 0; $i < $treatmentsResultCount; $i++) {
                                            if (in_array($singleLangResult->main_code, $filteredTreatmentLangCodeArray)) {
                                                if ($treatmentsResult[$i]->language_code == $singleLangResult->main_code) { ?>

                                                    <!-- Treatment Name -->
                                                    <label for="treatmentName-<?= $singleLangResult->main_code ?>" class="mb-1">Tedavi Adı <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <input type="text" id="treatmentName-<?= $singleLangResult->main_code ?>" name="treatmentName-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Tedavi Adı" value="<?= $treatmentsResult[$i]->name ?>">
                                                    </div>

                                                    <!-- Treatment Short Description -->
                                                    <label for="treatmentShortDescription-<?= $singleLangResult->main_code ?>" class="mb-1">Tedavi Kısa Açıklama <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <textarea type="text" id="treatmentShortDescription-<?= $singleLangResult->main_code ?>" name="treatmentShortDescription-<?= $singleLangResult->main_code ?>" class="form-control" rows="4" placeholder="Kısa Açıklama"><?= $treatmentsResult[$i]->short_content ?></textarea>
                                                    </div>

                                                    <label for="ckEditorTreatmentDescription-<?= $singleLangResult->main_code ?>" class="mb-1">Tedavi Açıklama <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <textarea type="text" id="ckEditorTreatmentDescription-<?= $singleLangResult->main_code ?>" name="ckEditorTreatmentDescription-<?= $singleLangResult->main_code ?>"><?= $treatmentsResult[$i]->content ?></textarea>
                                                    </div>

                                                    <!-- Treatment Image -->
                                                    <label for="treatmentImage-<?= $singleLangResult->main_code ?>" class="mb-1">Fotoğraf</label>
                                                    <div class="form-group mb-2">
                                                        <input type="file" class="form-control-file" id="treatmentImage-<?= $singleLangResult->main_code ?>" name="treatmentImage-<?= $singleLangResult->main_code ?>" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                                        <small for="fileHelp">Fotoğraf türü JPG veya PNG olmalıdır. Güncellenmesini istemiyorsanız lütfen fotoğraf seçmeyiniz.</small>
                                                    </div>
                                                <?php

                                                    break;
                                                }
                                            } else {   ?>
                                                <!-- Treatment Name -->
                                                <label for="treatmentName-<?= $singleLangResult->main_code ?>" class="mb-1">Tedavi Adı <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="treatmentName-<?= $singleLangResult->main_code ?>" name="treatmentName-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Tedavi Adı">
                                                </div>

                                                <!-- Treatment Short Description -->
                                                <label for="treatmentShortDescription-<?= $singleLangResult->main_code ?>" class="mb-1">Tedavi Kısa Açıklama <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" id="treatmentShortDescription-<?= $singleLangResult->main_code ?>" name="treatmentShortDescription-<?= $singleLangResult->main_code ?>" class="form-control" rows="4" placeholder="Kısa Açıklama"></textarea>
                                                </div>

                                                <label for="ckEditorTreatmentDescription-<?= $singleLangResult->main_code ?>" class="mb-1">Tedavi Açıklama <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" id="ckEditorTreatmentDescription-<?= $singleLangResult->main_code ?>" name="ckEditorTreatmentDescription-<?= $singleLangResult->main_code ?>"></textarea>
                                                </div>

                                                <!-- Treatment Image -->
                                                <label for="treatmentImage-<?= $singleLangResult->main_code ?>" class="mb-1">Fotoğraf</label>
                                                <div class="form-group mb-2">
                                                    <input type="file" class="form-control-file" id="treatmentImage-<?= $singleLangResult->main_code ?>" name="treatmentImage-<?= $singleLangResult->main_code ?>" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                                    <small for="fileHelp">Fotoğraf türü JPG veya PNG olmalıdır. Güncellenmesini istemiyorsanız lütfen fotoğraf seçmeyiniz.</small>
                                                </div>
                                        <?php
                                                break;
                                            }
                                        }
                                        ?>

                                        <div style="text-align: right !important">

                                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect mt-5 ">GÜNCELLE</button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <input type="text" class="d-none" id="idHolderInput" name="idHolderInput" value="<?= $treatmentID ?>" readonly>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>

    <script>
        $(function() {
            // CK Editor 
            <?php foreach ($allLangResult as $singleLangResult) { ?>
                CKEDITOR.replace('ckEditorTreatmentDescription-<?= $singleLangResult->main_code ?>');
            <?php } ?>
            CKEDITOR.config.height = 450;
        });
    </script>

    <!-- Update Treatment -->
    <script>
        var langDataHolder = "<?= $defaultLangResult[0]->code ?>";
        $(".nav-tab-lang").on('click', function() {
            langDataHolder = $(this).attr("lang-data")
        });

        $('#updateTreatmentForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var selectedLangCKEditor = 'ckEditorTreatmentDescription-' + langDataHolder;
            var ckEditorTreatmentDescription = CKEDITOR.instances[selectedLangCKEditor].getData();
            $data.append("treatmentDescription", ckEditorTreatmentDescription)

            Swal.fire({
                title: 'Tedaviyi güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $data.append("langDataHolder", langDataHolder);
                    $.ajax({
                        url: "API/update-treatment.php",
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