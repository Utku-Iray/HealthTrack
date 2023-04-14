<?php
include 'utility/header.php';

require_once 'utility/api/get-mission-vision.php';
?>
<style>
	.ht-list-design>ul>li {
		color: #3B919E;
		list-style: disc;
		font-size: 20px;
		margin: 0 0 0 18px;
		float: left;
		width: 100%;
		line-height: 34px;
		text-align: justify;
	}
</style>


<!--Start Banner-->

<div class="sub-banner">

	<img class="banner-img" src="images/banner/banner-degerlerimiz.jpg" alt="">
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


	<!--Start Welcome-->
	<div class="welcome-three">
		<div class="container">
		<div class="row">
				<div class="col-md-12">
					<div class="main-title ht-list-design">
						<h4> <?= $generalInfoCoreValues["title"] ?></h4> <br><br>
						<?= $generalInfoCoreValues["description"] ?>
					</div>

				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h4><?= $generalInfoVision["title"] ?></h4> <br><br>
						<span style="text-align: justify;"><?= $generalInfoVision["description"] ?></span>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h4><?= $generalInfoMission["title"] ?></h4> <br><br>
						<span style="text-align: justify;"> <?= $generalInfoMission["description"] ?></span>
					</div>
				</div>
			</div>
			<hr>
			
			<div class="row">
				<div class="col-md-12">
					<div class="main-title ht-list-design">
						<h4><?= $generalInfoPolicy["title"] ?></h4> <br><br>
						<?= $generalInfoPolicy["description"] ?>

					</div>
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h4><?= $generalInfoSustainability["title"] ?></h4> <br><br>
						<span style="text-align: justify;"> <?= $generalInfoSustainability["description"] ?></span>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--End Welcome-->

</div>
<!--End Content-->




<?php include 'utility/footer.php' ?>