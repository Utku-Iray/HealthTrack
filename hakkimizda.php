<?php
include 'utility/header.php';


require_once 'utility/api/get-about-us.php';
?>

<!--Start Banner-->

<div class="sub-banner">

	<img class="banner-img" src="images/banner/3.png" alt="">
	<div class="detail">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</div>

</div>

<!--End Banner-->



<!--Start Content-->
<div class="content ">


	<!--Start Welcome-->
	<div class="welcome-three">
		<div class="container">

			<div class="row">
				<div class="col-md-7">
					<div class="main-title">
						<h2><?= $generalInfoAboutUs["title"] ?></h2> <br><br>
						
						<?= $generalInfoAboutUs["description"] ?>

					</div>
				</div>
				<div class="col-md-5">
					<img src="images/hakkimizda-ana.jpg" alt="">
				</div>
			</div>

			<div class="welcome-detail">
				<div class="row">









				</div>
			</div>

		</div>
	</div>
	<!--End Welcome-->
	
	<!--Start Doctor Quote-->
	
	<!--End Doctor Quote-->


	


</div>
<!--End Content-->




<?php include 'utility/footer.php' ?>