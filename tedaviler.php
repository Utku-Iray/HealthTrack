<?php
include 'utility/header.php';

require_once 'utility/api/get-treatments.php';
?>


<!--Start Banner-->

<div class="sub-banner">

	<img class="banner-img" src="images/banner/1.png" alt="">
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
<div class="content" style="background-color:whitesmoke;">

	<div class="latest-news">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h2><span>Kişiye Özel</span> Tedavilerimiz</h2>
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
								<?php foreach ($treatmentsResult  as $singleTreatment) { ?>
									<div class="post item">
										<a href="tedavi-detay.php?url=<?= $singleTreatment->url ?>">
											<img class="lazyOwl" style="object-fit:contain !important;" src="<?= $singleTreatment->treatment_main_img ?>" alt="" />
											<div class="detail">
												<img src="images/bloglar-ana-kapak.jpg" alt="" />
												<h4 style="font-weight: 500; padding-bottom:10px;"><?= $singleTreatment->name ?></h4>
												<p>
													<?= $singleTreatment->short_content ?>
												</p>
												<div style="padding-top: 18px;">
													<a href="tedavi-detay.php?url=<?= $singleTreatment->url ?>" class="btn" style="background-color: #3B919E; color:white;">Devamını Okuyun</a>
												</div>

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