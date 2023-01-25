<?php
require "../database/connection.php";
require "controller.php";



if (isset($_GET["nid"])) {
    $urlNewsID = $_GET["nid"];
    include "API/get-news-with-id.php";
} else {
    header("Location: news.php");
}

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Haber Düzenle</title>
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
                            <h2><strong>Healthtrack Admin | </strong>Haber Düzenle</h2>
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




                        <form id="updateNewsForm" name="updateNewsForm" method="POST" enctype="multipart/form-data">
                            <div class="tab-content">
                                <?php foreach ($allLangResult as $singleLangResult) { ?>
                                    <div role="tabpanel" class="body tab-pane <?php if ($singleLangResult === reset($allLangResult)) echo "in active"; ?>" id="lang-<?= $singleLangResult->main_code ?>">

                                        <?php
                                        $newsResultCount = count($newsIDQueryResult);
                                        for ($i = 0; $i < $newsResultCount; $i++) {
                                            if (in_array($singleLangResult->main_code, $filteredNewsLangCodeArray)) {
                                                if ($newsIDQueryResult[$i]->language_code == $singleLangResult->main_code) {
                                                    # code...

                                        ?>

                                                    <!-- News Title -->
                                                    <label for="newsTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Başlık <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <input type="text" id="newsTitle-<?= $singleLangResult->main_code ?>" name="newsTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Başlık" value="<?= $newsIDQueryResult[$i]->title ?>">
                                                    </div>

                                                    <!-- News Short Content -->
                                                    <label for="newsShortContent-<?= $singleLangResult->main_code ?>" class="mb-1">Kısa İçerik <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <textarea type="text" id="newsShortContent-<?= $singleLangResult->main_code ?>" name="newsShortContent-<?= $singleLangResult->main_code ?>" class="form-control" rows="3" placeholder="Kısa İçerik (İçeriği anlatan cümleler veya içerikten bir kısım)"><?= $newsIDQueryResult[$i]->short_content ?></textarea>
                                                    </div>

                                                    <!-- News Content -->
                                                    <label for="ckeditorNewsContent-<?= $singleLangResult->main_code ?>" class="mb-1">İçerik <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <textarea id="ckeditorNewsContent-<?= $singleLangResult->main_code ?>" name="ckeditorNewsContent-<?= $singleLangResult->main_code ?>"><?= $newsIDQueryResult[$i]->content ?></textarea>
                                                    </div>

                                                    <!-- News Image -->
                                                    <label for="newsImage-<?= $singleLangResult->main_code ?>" class="mb-1">Fotoğraf</label>
                                                    <div class="form-group mb-2">
                                                        <input type="file" class="form-control-file" id="newsImage-<?= $singleLangResult->main_code ?>" name="newsImage-<?= $singleLangResult->main_code ?>" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                                        <small for="fileHelp">Fotoğraf türü JPG veya PNG olmalıdır. Güncellenmesini istemiyorsanız lütfen fotoğraf seçmeyiniz.</small>
                                                    </div>
                                                <?php
                                                    break;
                                                }
                                            } else {   ?>
                                                <!-- News Title -->
                                                <label for="newsTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Başlık <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="newsTitle-<?= $singleLangResult->main_code ?>" name="newsTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Başlık">
                                                </div>

                                                <!-- News Short Content -->
                                                <label for="newsShortContent-<?= $singleLangResult->main_code ?>" class="mb-1">Kısa İçerik <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" id="newsShortContent-<?= $singleLangResult->main_code ?>" name="newsShortContent-<?= $singleLangResult->main_code ?>" class="form-control" rows="3" placeholder="Kısa İçerik (İçeriği anlatan cümleler veya içerikten bir kısım)"></textarea>
                                                </div>

                                                <!-- News Content -->
                                                <label for="ckeditorNewsContent-<?= $singleLangResult->main_code ?>" class="mb-1">İçerik <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <textarea id="ckeditorNewsContent-<?= $singleLangResult->main_code ?>" name="ckeditorNewsContent-<?= $singleLangResult->main_code ?>"></textarea>
                                                </div>

                                                <!-- News Image -->
                                                <label for="newsImage-<?= $singleLangResult->main_code ?>" class="mb-1">Fotoğraf</label>
                                                <div class="form-group mb-2">
                                                    <input type="file" class="form-control-file" id="newsImage-<?= $singleLangResult->main_code ?>" name="newsImage-<?= $singleLangResult->main_code ?>" accept="image/png, image/jpeg" aria-describedby="fileHelp">
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
                            <input type="text" class="d-none" id="idHolderInput" name="idHolderInput" value="<?= $urlNewsID ?>" readonly>
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
                CKEDITOR.replace('ckeditorNewsContent-<?= $singleLangResult->main_code ?>');
            <?php } ?>
            CKEDITOR.config.height = 450;
        });
    </script>

    <!-- Update News -->
    <script>
        var langDataHolder = "<?= $defaultLangResult[0]->code ?>";
        $(".nav-tab-lang").on('click', function() {
            langDataHolder = $(this).attr("lang-data")
        });

        $('#updateNewsForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);

            var selectedLangCKEditor = 'ckeditorNewsContent-' + langDataHolder;
            var ckeditorNewsContent = CKEDITOR.instances[selectedLangCKEditor].getData();
            $data.append("newsContent", ckeditorNewsContent)

            Swal.fire({
                title: 'Haberi güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $data.append("langDataHolder", langDataHolder);
                    $.ajax({
                        url: "API/update-news.php",
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