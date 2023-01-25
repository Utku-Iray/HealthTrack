<?php

include 'utility/header.php';
require_once 'utility/api/get-news.php';

if (isset($_GET["url"])) {
    $newsURL = $_GET["url"];

    include "utility/api/get-news-with-id.php";
} else {
    header("Location: tedaviler.php");
}


?>

<!--Start Banner-->
<div class="sub-banner">

    <img class="banner-img" src="<?= $selectedNewsResult["news_image"] ?>" alt="">
    <div class="detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="paging">
                        <h2><?= $selectedNewsResult["title"] ?></h2>
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            <li><a href="saglikli-haber.php">Sağlıklı Haber</a></li>
                            <li><a><?= $selectedNewsResult["title"] ?></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<!--End Banner-->

<div class="content">
    <div class="procedures">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="procedure-text">
                        <div class="detail">
                            <?= $selectedNewsResult["content"] ?></a>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--End Content-->



    <?php include 'utility/footer.php' ?>