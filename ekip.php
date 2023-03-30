<?php
include 'utility/header.php';

require_once 'utility/api/get-team-member.php';
?>



<!--Start Banner-->

<div class="sub-banner">

    <img class="banner-img" src="images/banner/banner-ekibimiz.jpg" alt="">
    <div class="detail">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>

</div>

<!--End Banner-->

<!--Start Content-->
<div class="content" style="margin-bottom: 50px;padding:0 15px">

    <div class="container" style="padding-top: 50px;">
        <div class="row">
            <h2 style="text-align: center;"><?= $generalInfoTeamMember["title"] ?></h2>
            <p>
                <?= $generalInfoTeamMember["description"] ?>
            </p>

            <hr>

            <?php foreach ($membersResult as $singleMember) { ?>


                <a href="doktor-detay.php?id=<?= $singleMember->member_id ?>">
                    <div class="col-md-3 ekibimiz">
                        <img src="<?= $singleMember->member_photo ?>" alt="<?= $singleMember->member_name ?> Photo">
                        <div style="margin:20px;text-align:center;color:#10464e">
                            <h6><?= $singleMember->member_name ?></h6>
                            <span style="margin-top: 10px;"><?= $singleMember->title ?></span>
                        </div>
                    </div>
                </a>




            <?php  } ?>
        </div>
    </div>
</div>
<!--End Content-->





<?php include 'utility/footer.php' ?>