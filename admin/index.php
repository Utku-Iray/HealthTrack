<?php
require "../database/connection.php";
require "controller.php";

include 'API/get-most-click-data.php';

?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <?php include "utility/head.php" ?>

    <title>Healthtrack Admin | Anasayfa</title>
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
                            <h2><strong>Healthtrack Admin | </strong>Anasayfa</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>En Çok Okunan</strong> Haberler</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive social_media_table">
                                <table class="table mb-0 table-hover">
                                    <tbody>

                                        <?php foreach ($mostClickNews as $singleResult) { ?>
                                            <tr>
                                                <td>
                                                    <span class="text-muted"><?= $singleResult->title ?></span>
                                                </td>
                                                <td class="text-end">
                                                <td><i class="zmdi zmdi-eye zmdi-hc-2x col-amber"></i><?= $singleResult->news_click_count ?></td>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3 mt-2">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>En Çok Ziyaret Edilen</strong> Tedaviler</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive social_media_table">
                                <table class="table mb-0 table-hover">
                                    <tbody>
                                        <?php foreach ($mostClickTreatments  as $singleTResult) { ?>
                                            <tr>
                                                <td>
                                                    <span class="text-muted"><?= $singleTResult->name ?></span>
                                                </td>
                                                <td class="text-end">
                                                <td><i class="zmdi zmdi-mouse zmdi-hc-2x col-amber"></i><?= $singleTResult->treatment_click_count ?></td>
                                                </td>
                                            </tr>
                                        <?php } ?>
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