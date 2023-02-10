<?php
require "../database/connection.php";
require "controller.php";



if (isset($_GET["mid"])) {
    $urlMemberID = $_GET["mid"];

    include "API/get-member-with-id.php";
} else {
    header("Location: team-members.php");
}

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Ekip Üyesi Düzenle</title>
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
                            <h2><strong>Healthtrack Admin | </strong>Ekip Üyesi Düzenle</h2>
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




                        <form id="updateTeamMemberForm" name="updateTeamMemberForm" method="POST" enctype="multipart/form-data">
                            <div class="tab-content">
                                <?php foreach ($allLangResult as $singleLangResult) { ?>
                                    <div role="tabpanel" class="body tab-pane <?php if ($singleLangResult === reset($allLangResult)) echo "in active"; ?>" id="lang-<?= $singleLangResult->main_code ?>">

                                        <?php
                                        $membersResultCount = count($membersResult);
                                        for ($i = 0; $i < $membersResultCount; $i++) {
                                            if (in_array($singleLangResult->main_code, $filteredMemberLangCodeArray)) {
                                                if ($membersResult[$i]->language_code == $singleLangResult->main_code) { ?>

                                                    <!-- Member Name -->
                                                    <label for="memberName-<?= $singleLangResult->main_code ?>" class="mb-1">Ad, Soyad <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <input type="text" id="memberName-<?= $singleLangResult->main_code ?>" name="memberName-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Ad, Soyad" value="<?= $membersResult[$i]->member_name ?>">
                                                    </div>

                                                    <!-- Member Title -->
                                                    <label for="memberTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Ünvan <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <input type="text" id="memberTitle-<?= $singleLangResult->main_code ?>" name="memberTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Ünvan (Doktor, Hemşire vb.)" value="<?= $membersResult[$i]->title ?>">
                                                    </div>

                                                    <!-- Member Description -->
                                                    <label for="memberDescription-<?= $singleLangResult->main_code ?>" class="mb-1">Açıklama <span class="text-danger">(*)</span></label>
                                                    <div class="form-group mb-3">
                                                        <textarea type="text" id="memberDescription-<?= $singleLangResult->main_code ?>" name="memberDescription-<?= $singleLangResult->main_code ?>" class="form-control" rows="4" placeholder="Açıklama (Hakkında bilgiler, çalışma geçmişi vb.)"><?= $membersResult[$i]->description ?></textarea>
                                                    </div>


                                                <?php
                                                    // array_splice($membersResult, $i, 1);
                                                    break;
                                                }
                                            } else {   ?>
                                                <!-- Member Name -->
                                                <label for="memberName-<?= $singleLangResult->main_code ?>" class="mb-1">Ad, Soyad <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="memberName-<?= $singleLangResult->main_code ?>" name="memberName-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Ad, Soyad" value="<?= $membersResult[0]->member_name ?>">

                                                </div>

                                                <!-- Member Title -->
                                                <label for="memberTitle-<?= $singleLangResult->main_code ?>" class="mb-1">Ünvan <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <input type="text" id="memberTitle-<?= $singleLangResult->main_code ?>" name="memberTitle-<?= $singleLangResult->main_code ?>" class="form-control" placeholder="Ünvan (Doktor, Hemşire vb.)">
                                                </div>

                                                <!-- Member Description -->
                                                <label for="memberDescription-<?= $singleLangResult->main_code ?>" class="mb-1">Açıklama <span class="text-danger">(*)</span></label>
                                                <div class="form-group mb-3">
                                                    <textarea type="text" id="memberDescription-<?= $singleLangResult->main_code ?>" name="memberDescription-<?= $singleLangResult->main_code ?>" class="form-control" rows="4" placeholder="Açıklama (Hakkında bilgiler, çalışma geçmişi vb.)"></textarea>
                                                </div>

                                                <!-- Member Image -->
                                                <!-- <label for="memberImage-" class="mb-1">Fotoğraf</label>
                                                <div class="form-group mb-2">
                                                    <input type="file" class="form-control-file" id="memberImage-" name="memberImage-" accept="image/png, image/jpeg" aria-describedby="fileHelp">
                                                    <small for="fileHelp">Fotoğraf türü JPG veya PNG olmalıdır. Güncellenmesini istemiyorsanız lütfen fotoğraf seçmeyiniz.</small>
                                                </div> -->
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
                            <input type="text" class="d-none" id="idHolderInput" name="idHolderInput" value="<?= $urlMemberID ?>" readonly>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "utility/script.php"; ?>

    <!-- Update Team Member -->
    <script>
        var langDataHolder = "<?= $defaultLangResult[0]->code ?>";
        $(".nav-tab-lang").on('click', function() {
            langDataHolder = $(this).attr("lang-data")
        });

        $('#updateTeamMemberForm').submit(function() {
            event.preventDefault()
            var $data = new FormData(this);



            Swal.fire({
                title: 'Ekip üyesini güncellemek istediğinize emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, eminim.',
                cancelButtonText: 'Hayır, kontrol edeceğim.',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $data.append("langDataHolder", langDataHolder);
                    $.ajax({
                        url: "API/update-team-member.php",
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