<?php
include 'utility/header.php'; ?>
<!--Start Banner-->

<div class="sub-banner">

    <img class="banner-img" src=<?php if ($selectedLang == "tr") {
	echo "images/banner/banner-randevu.jpg";
	} else {
		echo "images/banner/randevu-en.png";
	} ?>  alt="">
    <div class="detail">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>

</div>
<!--End Banner-->



<!--Start Content-->
<div class="content">



    <div class="contact-us">


        <div class="leave-msg ">
            <div class="container">

                <div class="rox">
                    <div class="col-md-7">

                        <div class="main-title">
                            <h2><?php echo $lang['createYourAppointmentRequest'] ?></h2>
                        </div>

                        <div class="form">
                            <div class="row">
                                <p class="success" id="success" style="display:none;"></p>
                                <p class="error" id="error" style="display:none;"></p>
                                <form method="POST" action="mail/mail.php">
                                    <div class="col-md-6"><input type="text" data-delay="300" placeholder="<?php echo $lang['nameSurname'] ?>" name="name" class="input" required=""></div>
                                    <div class="col-md-6"><input type="text" data-delay="300" placeholder="<?php echo $lang['eMail'] ?>" name="email" class="input" required=""></div>
                                    <div class="col-md-12"><input type="text" data-delay="300" placeholder="<?php echo $lang['phone'] ?>" name="phone" class="input" required=""></div>
                                    <div class="col-md-12"><input type="text" data-delay="300" placeholder="<?php echo $lang['subject'] ?>" name="subject" class="input" required=""></div>

                                    <div class="col-md-12"><textarea data-delay="500" class="required valid" placeholder="<?php echo $lang['message'] ?>" name="message" id="message" required=""></textarea></div>
                                    <div class="col-md-3"><button style="background-color: #42717a;color: white;" class="btn btn--secondary"><?php echo $lang['form'] ?><i class="energia-arrow-right"></i></button></div>
                                </form>

                            </div>
                        </div>


                    </div>

                    <div class="col-md-5" style="padding: 20px;">

                        <img style="box-shadow: 3px 0px 11px 10px #ccc;border-radius: 15px;" src="images/health1.jpeg" alt="">
                    </div>

                </div>

            </div>
        </div>

    </div>


</div>
<!--End Content-->

<?php include 'utility/footer.php'; ?>