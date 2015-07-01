<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/engine.php";
?>

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Panan's Updater</title>

	<link type="text/css" rel="stylesheet" href="./css/compiled/styles.css" />
</head>

<body>
	<div class="wrapper">
		<div class="page-title">
			<h1>Painan's Updater</h1>
		</div>

		<div class="buttons">
			<div class="button" data-site="-1">ALL SITES</div>
			<?php
			foreach (Website::getAllWebsites() as $site) {
				echo "<div class='button' data-site='{$site->getId()}'>{$site->getName()}</div>";
			}
			?>
		</div>

		<div class="spacer"></div>

		<pre class="console">
Hi. Welcome to Painan.
		</pre>

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="./js/scripts.js"></script>
</body>
</html>