<?php
include 'utility/header.php';

require_once 'utility/api/get-team-member.php';
?>



<!--Start Banner-->

<div class="sub-banner">

    <img class="banner-img" src="images/slider-2.jpg" alt="">
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
            <h2 style="text-align: center;"><?php echo $lang["tedaviOnayiTitle"] ?></h2>
            <br>
            <p>
            <?php echo $lang["tedaviOnayiDescription"] ?>
            </p>


        </div>
    </div>
</div>
<!--End Content-->





<?php include 'utility/footer.php' ?>