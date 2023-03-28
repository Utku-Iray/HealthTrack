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

    <img class="banner-img" src="images/tedavi-banner.png" alt="">
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


    <script type="text/javascript">
        $(document).ready(function() {
            var interval = 0;
            const nid = "<?= $selectedNewsResult["news_id"] ?>";

            setInterval(function() {
                interval++;
                postFunction();
            }, 20000);

            function postFunction() {
                if (interval == 1) {
                    $.ajax({
                        url: "utility/api/update-news-click-count.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            click_count: "plus",
                            nid: nid
                        },
                        success: function() {}
                    });
                }
            }

        });
    </script>