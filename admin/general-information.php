<?php
require "../database/connection.php";
require "controller.php";

include "API/get-general-info.php";
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>
    <title>Healthtrack Admin | Genel Bilgiler</title>
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
                            <h2><strong>Healthtrack Admin |</strong> Genel Bilgiler</h2>
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
                                            <th>Genel Bilgi Başlığı</th>
                                            <th>Düzenle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($generalInfoQueryResult as $singleGeneralInfo) { ?>
                                            <tr class="general-<?= $singleGeneralInfo->general_id ?>">
                                                <td><?= $singleGeneralInfo->title ?></td>
                                                <td class="text-center"><a href="general-information-details.php?gid=<?= $singleGeneralInfo->general_id ?>" class="btn btn-info">DÜZENLE</a></td>
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



</body>

</html>