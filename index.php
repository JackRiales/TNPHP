<?php
	# Defines the site root. Used for inclusions.
	$site_name = $_SERVER["DOCUMENT_ROOT"]."/tnphp";
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
	<?php include $site_name."/php/part/html_head.php"; ?>
</head>

<body>
	<header>
		<?php include $site_name."/php/part/header.php"; ?>
	</header>

	<main>
		<?php include $site_name."/php/part/main.php"; ?>
	</main>

	<footer>
		<?php include $site_name."/php/part/footer.php"; ?>
	</footer>
</body>

</html>