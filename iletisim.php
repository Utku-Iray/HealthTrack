<?php
include 'utility/header.php';

require_once 'utility/api/get-contact-information.php';
?>


<!--Start Banner-->

<div class="sub-banner">

	<img class="banner-img" src="images/banner/7.png" alt="">
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
		<div class="container">

			<div class="row">
				<div class="col-md-12">

					<div class="our-location">
						<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.676746090477!2d28.99744637493153!3d41.05419761659786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab75b99b9f8b9%3A0xddb5548852e3f527!2sSelenium%20Plaza!5e0!3m2!1str!2str!4v1671575662666!5m2!1str!2str" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
						<!-- <div class="get-directions">
                        	<form action="http://maps.google.com/maps" method="get" target="_blank">
                               <input type="text" name="saddr" placeholder="Enter Your Address" />
                               <input type="hidden" name="daddr" value="Envato Pty Ltd, Elizabeth Street, Melbourne, Victoria, Australia" />
                               <input type="submit" value="Get directions" class="direction-btn" />
                            </form>
                        </div> -->
					</div>

				</div>
			</div>

		</div>


		<div class="leave-msg dark-back">
			<div class="container">

				<div class="rox">
					<div class="col-md-7">

						<div class="main-title">
							<h2>Size Nasıl Yardımcı Olabiliriz?</h2>
							<p>Daha detaylı bilgi almak için formu doldurarak bizimle iletişime geçebilirsiniz.</p>
						</div>

						<div class="form">
							<div class="row">
								<p class="success" id="success" style="display:none;"></p>
								<p class="error" id="error" style="display:none;"></p>
								<form method="POST" action="mail/mail.php">
									<div class="col-md-6"><input type="text" data-delay="300" placeholder="İsim Soyisim" name="name" class="input" required=""></div>
									<div class="col-md-6"><input type="text" data-delay="300" placeholder="E-mail" name="email" class="input" required=""></div>
									<div class="col-md-6"><input type="text" data-delay="300" placeholder="Telefon Numarası" name="phone" class="input" required=""></div>
									<div class="col-md-6"><input type="text" data-delay="300" placeholder="Konu" name="subject" class="input" required=""></div>

									<div class="col-md-12"><textarea data-delay="500" class="required valid" placeholder="Message" name="message" id="message" required=""></textarea></div>
									<div class="col-md-3"><button style="background-color: #42717a;color: white;" class="btn btn--secondary">Formu İlet <i class="energia-arrow-right"></i></button></div>
								</form>

							</div>
						</div>


					</div>

					<div class="col-md-5">

						<div class="contact-get">
							<div class="main-title">
								<h2>Bize<span>ULAŞIN</span> </h2>
								<!-- <p>cursus lorem molestie vitae. Nulla vehicula, lacus ut suscipit fermentum, turpis felis ultricies.</p> -->
							</div>

							<div class="get-in-touch" style="margin-top: 60px;">
								<div class="detail">
									<span><b>Telefon Numarası:</b></span>
									<?php foreach ($contactQueryResult as $singleResult) {
										if ($singleResult->contact_type == "Telefon") { ?>
											<span><?= $singleResult->contact_content ?></span>
									<?php 	}
									} ?>
									<span><b>E-posta:</b></span>
									<?php foreach ($contactQueryResult as $singleResult) {
										if ($singleResult->contact_type == "E-posta") { ?>
											<span><?= $singleResult->contact_content ?></span>
									<?php 	}
									} ?>
									<span><b>Adres:</b></span>
									<?php foreach ($contactQueryResult as $singleResult) {
										if ($singleResult->contact_type == "Adres") { ?>
											<span><?= $singleResult->contact_content ?></span>
									<?php 	}
									} ?>

								</div>

								<div class="social-icons">
									<a href="https://www.facebook.com/healthtrackclinic" class="fb"><i class="icon-euro"></i></a>
									<a href="https://www.linkedin.com/company/healthtrack-clinic/" class="tw"><i class="icon-linkedin3"></i></a>
									<a href="https://www.instagram.com/healthtrackclinic/" class="gp"><i class="icon-instagram"></i></a>


								</div>
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