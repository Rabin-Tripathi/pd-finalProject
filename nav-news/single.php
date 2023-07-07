<?php
include '../config.php';

$sql;

if (isset($_GET['id'])) {
	$newsId = (int) mysqli_real_escape_string($conn, $_GET['id']);
	$sql = "SELECT * FROM news n INNER JOIN category c on n.category_id = c.id WHERE n.id={$newsId};";
}
?>


<!DOCTYPE html>
<html class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Olympic News</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700'
		rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="js/modernizr-2.6.2.min.js"></script>

</head>

<body>

	<header id="fh5co-header">

		<div class="container-fluid">
			<div class="row">
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
				</ul>
				<div class="col-lg-12 col-md-12 text-center">
					<a style="max-width: fit-content;margin-right: 1100px;positon:sticky;" href="index.php"><button
							class="button" style="margin-top: 30px;"><i class="fa fa-arrow-left"
								style="padding-right:8px;"></i>Back</button></a>
					<h1 id="fh5co-logo">Olympic <sup>News</sup>
					</h1>
				</div>

			</div>

		</div>

	</header>
	<!-- END #fh5co-header -->
	<div class=" container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article
				class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<?php
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) {
						$row = $result->fetch_assoc();
						echo '<figure class="animate-box"><img src="' . $row['image_url'] . '" alt="Image" class="img-responsive"></figure>';
						echo '<span class="fh5co-meta animate-box">' . $row['name'] . '</span>';
						echo '<h2 class="fh5co-article-title animate-box">' . $row['title'];
						echo '</h2>';
						echo '<span class="fh5co-meta fh5co-date animate-box"> ' . $row['created_at'] . ' </span>';

						echo '<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article"><div class="row"><div class="animate-box">' . $row['description'] . '</div>';
						echo '</div>';
						echo '</div>';
					}
				}
				?>
		</div>
		</article>
	</div>
	</div>

	<footer style="padding:0; margin">
		<?php require "../component/footer.php" ?>
	</footer>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

</body>

</html>