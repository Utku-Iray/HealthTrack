<?php
include 'utility/header.php';

require_once 'utility/api/get-team-member.php';
?>



<!--Start Banner-->

<div class="sub-banner">

    <img class="banner-img" src="images/banner/4.png" alt="">
    <div class="detail">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>

</div>

<!--End Banner-->

<!--Start Content-->
<div class="content" style="margin-bottom: 50px;">

    <div class="container" style="padding-top: 50px;">
        <div class="row">
            <h2 style="text-align: center;"><?= $generalInfoTeamMember["title"] ?></h2>
            <p>
                <?= $generalInfoTeamMember["description"] ?>
            </p>
           
            <hr>

            <?php foreach ($membersResult as $singleMember) { ?>
                <div class=" col-md-4 col-sm-6">
                    <img src="<?= $singleMember->member_photo ?>" alt="<?= $singleMember->member_name ?> Photo">
                    <h6><?= $singleMember->member_name ?></h6>
                    <span style="margin-top: 10px;"><?= $singleMember->title ?></span> <br><br>
                    <p style="text-align: justify; line-height:25px"><?= $singleMember->description ?></p>

                </div>
            <?php  } ?>
        </div>
    </div>
</div>
<!--End Content-->





<?php include 'utility/footer.php' ?>