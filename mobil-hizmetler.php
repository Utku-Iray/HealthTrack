<?php include 'header.php'; ?>
<!--Start Banner-->

<div class="sub-banner">

	<img class="banner-img" src="images/sub-banner.jpg" alt="">
	<div class="detail">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="paging">
						<h2>Mobil Hizmetler</h2>
						<ul>
							<li><a href="index.php">Anasayfa</a></li>
							<li><a href="tedaviler.php">Tedaviler</a></li>
							<li><a>Mobil Hizmetler</a></li>
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
				<?php include 'tedaviler-sidebar.php' ?>



				<div class="col-md-8">

					<div class="main-title">
						<h2><span>Mobil </span>Hizmetler</h2>

					</div>

					
				

				</div>

			</div>
			<?php include 'tedaviler-blog.php' ?>
		</div>
	</div>
	<!--End Content-->


	<?php include 'footer.php'; ?>