<?php

session_start();

$sql = "SELECT n.id, n.title, n.description, n.created_at, n.image_url, c.name as category FROM news n inner join category c on n.category_id = c.id";

include '../config.php';
?>


<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->

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

	<script src="js/modernizr-2.6.2.min.js"></script>

	<style>
		ul {
			margin-bottom: 0px;
			padding-left: 0px;
		}

		a {
			padding: 0;
			margin: 0;
		}

		p {
			padding-bottom: 0;
			margin-bottom: 0;
		}

		h2 {
			margin: 0;
		}


		h3 {
			margin: 0;
		}


		button.dropbtn {
			padding: -1px 10px;
		}
	</style>
</head>

<body>
	<?php require "../component/header.php" ?>

	<div class="container-fluid" style="margin-top:68px;">
		<div class="row fh5co-post-entry">
			<?php
			if ($result = $conn->query($sql)) {
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo '<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">';
						echo '<figure>';
						echo '<a href="./single.php?id=' . $row["id"] . '"><img src="' . $row['image_url'] . '" alt="Image" class="img-responsive"></a>';
						echo '</figure>';
						echo '<span class="fh5co-meta">' . $row['category'] . '</a></span>';
						echo '<h2 class="fh5co-article-title">' . $row['title'] . '</a></h2>';
						echo '<span class="fh5co-meta fh5co-date">' . $row['created_at'] . '</span>';
						echo '</article>';
					}

				}
			}
			$conn->close();

			?>
			<div class="clearfix visible-xs-block"></div>
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