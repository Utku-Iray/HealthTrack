<?php
include 'utility/header.php';

$doc_id = "";
if (isset($_GET["id"])) {
	$doc_id = $_GET["id"];
	require_once 'utility/api/get-single-member.php';
} else {
	header("Location: ekip.php");
}



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
<div class="content">


	<!--Start Team Detail-->
	<div class="member-detail">
		<div class="container">


			<div class="row">


				<div class="col-md-5">
					<img src="<?= $membersResult["member_photo"] ?>" alt="">
				</div>

				<div class="col-md-7">
					<div class="team-detail">

						<div class="name">
							<h6><?= $membersResult["member_name"] ?></h6>
							<span><?= $membersResult["title"] ?></span>
						</div>

						<ul>
							<li><span class="title">Açıklama</span> <span><?= $membersResult["description"] ?></span></li>

						</ul>

					</div>
				</div>


			</div>

		</div>
	</div>
	<!--End Team Detail-->


</div>
<!--End Content-->




<?php include 'utility/footer.php' ?>