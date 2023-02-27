<?php

include 'utility/header.php';
require_once 'utility/api/get-treatments.php';

if (isset($_GET["url"])) {
	$treatmentURL = $_GET["url"];

	include "utility/api/get-treatment-with-id.php";
	include "utility/api/get-news.php";
} else {
	header("Location: tedaviler.php");
}


?>
<!--Start Banner-->

<div class="sub-banner">

	<img class="banner-img" src="<?= $selectedTreatmentResult["treatment_main_img"] ?>" alt="">
	<div class="detail">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="paging">
						<h2><?= $selectedTreatmentResult["name"] ?></h2>
						<ul>
							<li><a href="index.php">Anasayfa</a></li>
							<li><a href="tedaviler.php">Tedaviler</a></li>
							<li><a><?= $selectedTreatmentResult["name"] ?></a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<!--End Banner-->



<!--Start Content-->
<div class="content">
	<div class="procedures">
		<div class="container">

			<div class="row">
				<!-- <div class="col-md-4">
					<div class="procedures-links">
						<span class="title">Tedaviler</span>
						<ul id="procedures-links" class="accordion">
							<li class="open">
								<div class="link">Tedaviler<i class="icon-chevron-down"></i></div>
								<ul class="submenu" style="display:block;">
									<?php foreach ($treatmentsResult as $singleTreatment) { ?>

										<li><a href="tedavi-detay.php?url=<?= $singleTreatment->url ?>"><?= $singleTreatment->name ?></a></li>
									<?php    } ?>
								</ul>
							</li>
					</div>
				</div> -->
				<div class="col-md-12">
					<div class="main-title">
						<h2><?= $selectedTreatmentResult["name"] ?></h2>
					</div>
					<div class="procedure-text">
						<div class="detail">
							<?= $selectedTreatmentResult["content"] ?></a>



							<!-- <div class="detail top-space">
								<div class="title-main">
									<h4>Cancer Center FAQ</h4>
									<div class="procedures-links">

										<ul id="procedures-faq" class="accordion">
											<li class="open">
												<div class="link">Outpatient Rehabilitation<i class="icon-chevron-down"></i></div>
												<ul class="submenu" style="display:block;">
													<li><span>Welcome to Medical Guide Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</span></li>
												</ul>
											</li>
											<li>
												<div class="link">Outpatient Surgery<i class="icon-chevron-down"></i></div>
												<ul class="submenu">
													<li><span>Welcome to Medical Guide Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</span></li>
												</ul>
											</li>
											<li>
												<div class="link">Dental Instruments<i class="icon-chevron-down"></i></div>
												<ul class="submenu">
													<li><span>Welcome to Medical Guide Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</span></li>
												</ul>
											</li>
											<li>
												<div class="link">Outpatient Rehabilitation<i class="icon-chevron-down"></i></div>
												<ul class="submenu">
													<li><span>Welcome to Medical Guide Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</span></li>
												</ul>
											</li>
											<li>
											</li>

										</ul>

									</div>
								</div> 

							</div> -->
						</div>
					</div>
					<br><br>
					<div class="col-md-12" style="align-items:center;">
						<button class="btn" style="border: solid 1px #3B919E; background-color:white; color:#3B919E !important;">Ne Dersiniz? Başlayalım Mı ?</button>
					</div>
				</div>
			</div>
		</div>

		<div class="latest-news">
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
													<img src="images/bloglar-ana-kapak.jpg" alt="" />
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


	<?php include 'utility/footer.php'; ?>

	<script type="text/javascript">
		$(document).ready(function() {
			var interval = 0;
			const tid = "<?= $selectedTreatmentResult["treatment_id"] ?>";

			setInterval(function() {
				interval++;
				postFunction();
			}, 15000);

			function postFunction() {
				if (interval == 1) {
					$.ajax({
						url: "utility/api/update-treatment-click-count.php",
						type: "POST",
						dataType: "json",
						data: {
							click_count: "plus",
							tid: tid
						},
						success: function() {}
					});
				}
			}
		});
	</script>