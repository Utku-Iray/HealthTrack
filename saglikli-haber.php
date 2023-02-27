<?php
include 'utility/header.php';

require_once 'utility/api/get-news.php';
?>


<!--Start Banner-->

<div class="sub-banner">

    <img class="banner-img" src="images/banner/6.png" alt="">
    <div class="detail">
        <div class="container">
            <div class="row">
                <!--  -->
            </div>
        </div>
    </div>

</div>

<!--End Banner-->



<!--Start Content-->
<div class="content">

    <div class="latest-news" style="background-color:whitesmoke;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <h2><span>Sağlıklı</span> Haber</h2>
                        <!-- <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Similique aut rerum atque molestiae, quos sequi.
                        </p> -->
                    </div>
                </div>
            </div>

            <div id="latest-news">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div id="owl-demo" class="owl-carousel">
                                <?php foreach ($newsResult  as $singleNews) { ?>
                                    <div class="post item">
                                        <a href="saglikli-haber-detay.php?url=<?= $singleNews->url ?>">
                                            <img class="lazyOwl" style="object-fit:contain !important;" src="<?= $singleNews->news_image ?>" alt="" />
                                            <div class="detail">
                                                <!-- <img src="images/bloglar-ana-kapak.jpg" alt="" /> -->
                                                <h4 style="font-weight: 500; padding-bottom:10px;"><?= $singleNews->title ?></h4>
                                                <p>
                                                    <?= $singleNews->short_content ?>
                                                </p>
                                                <div style="padding-top: 18px;">
                                                    <a href="saglikli-haber-detay.php?url=<?= $singleNews->url ?>" class="btn" style="background-color: #3B919E; color:white;">Devamını Okuyun</a>
                                                </div>
                                                <span><i class="icon-clock3"></i> <?= $singleNews->created_at ?></span>
                                                <!-- <span class="comment"><a href="#"><i class="icon-icons206"></i> 5 Comments</a></span> -->
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!--End Content-->




<?php include 'utility/footer.php' ?>