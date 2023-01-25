<?php
require "../database/connection.php";
require "controller.php";



if (isset($_GET["gid"])) {
    $urlGeneralID = $_GET["gid"];

    include "API/get-general-info-with-id.php";
} else {
    header("Location: general-information.php");
}

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Genel Bilgiyi Düzenle</title>
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
                            <h2><strong>Healthtrack Admin | </strong>Genel Bilgiyi Düzenle</h2>
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




                        <form id="updateGeneralInfoForm" name="updateGeneralInfoForm" method="POST" enctype="multipart/form-data">
                            <div class="tab-content">
                                <?php foreach ($allLangResult as $singleLangResult) { ?>
                                    <div role="tabpanel" class="body tab-pane <?php if ($singleLangResult === reset($allLangResult)) echo "in active"; ?>" id="lang-<?= $singleLangResult->main_code ?>">

                                        <?php
                                        $generalInfoResultCount = count($generalInfoQueryResult);
                                        for ($i = 0; $i < $generalInfoResultCount; $i++) {
                                            if (in_array($singleLangResult->main_code, $filteredGeneralInfoLangCodeArray)) {
                                                if ($generalInfoQueryResult[$i]->language_code == $singleLangResult->main_code) { ?>

                                                    <!-- General Info Title -->
                                                    <label for="generalInfoTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Başlık <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <input type="text" id="generalInfoTitle-<?= $singleLangResult->main_code ?>" name="generalInfoTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Başlık" value="<?= $generalInfoQueryResult[$i]->title ?>">
                                                    </div>

                                                    <!-- General Info Description-->
                                                    <label for="ckEditorGeneralInfoDesc-<?= $singleLangResult->main_code ?>" class="mb-1">İçerik, Açıklama <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <textarea type="text" id="ckEditorGeneralInfoDesc-<?= $singleLangResult->main_code ?>" name="ckEditorGeneralInfoDesc-<?= $singleLangResult->main_code ?>"><?= $generalInfoQueryResult[$i]->description ?></textarea>
                                                    </div>


                                                <?php
                                                    break;
                                                }
                                            } else {   ?>
                                                <!-- Member Name -->
                                                <label for="generalInfoTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Başlık <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="generalInfoTitle-<?= $singleLangResult->main_code ?>" name="generalInfoTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Başlık">
                                                </div>

                                                <!-- Member Title -->
                                                <label for="ckEditorGeneralInfoDesc-<?= $singleLangResult->main_code ?>" class="mb-1">İçerik, Açıklama <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" id="ckEditorGeneralInfoDesc-<?= $singleLangResult->main_code ?>" name="ckEditorGeneralInfoDesc-<?= $singleLangResult->main_code ?>"></textarea>
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
                            <input type="text" class="d-none" id="idHolderInput" name="idHolderInput" value="<?= $urlGeneralID ?>" readonly>
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
                CKEDITOR.replace('ckEditorGeneralInfoDesc-<?= $singleLangResult->main_code ?>');
            <?php } ?>
            CKEDITOR.config.height = 450;
        });
    </script>

    <!-- Update General Information -->
    <script>
        var langDataHolder = "<?= $defaultLangResult[0]->code ?>";
        $(".nav-tab-lang").on('click', function() {
            langDataHolder = $(this).attr("lang-data")
        });

        $('#updateGeneralInfoForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var selectedLangCKEditor = 'ckEditorGeneralInfoDesc-' + langDataHolder;
            var ckEditorGeneralInfoDesc = CKEDITOR.instances[selectedLangCKEditor].getData();
            $data.append("generalInfoDesc", ckEditorGeneralInfoDesc)

            Swal.fire({
                title: 'Bilgiyi güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $data.append("langDataHolder", langDataHolder);
                    $.ajax({
                        url: "API/update-general-information.php",
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