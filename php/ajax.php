<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/engine.php";

if (!isset($_GET['web-id']) && !isset($_GET['start-id'])) {
	echo "Nothing given :(";
	exit;
}
if (isset($_GET['web-id'])) {
	function echoSite(Website $site) {
		echo $site->getName() . ":\r\n";
		echo $site->update() . "\r\n";
	}

	$webId = $_GET['web-id'];
	if ($webId == "-1") {
		// Update all
		foreach (Website::getAllWebsites() as $site) {
			echoSite($site);
		}
	} else {
		// Update single site
		QueryBuilder::create(SQL::getConnection())
			->withQuery("SELECT display_name, folder_name FROM websites WHERE id = ?")
			->withParam($webId, QueryBuilder::PARAM_TYPE_INT)
			->build()
			->forEachResult(function ($row) {
				$site = new Website(0, $row['display_name'], $row['folder_name']);
				echoSite($site);
			});
	}
}
else {
	function echoStart(Startables $starter) {
		echo $starter->getName() . ":\r\n";
		echo $starter->start() . "\r\n";
	}

	$webId = $_GET['start-id'];
	/*if ($webId == "-1") {
		// Update all
		foreach (Website::getAllWebsites() as $site) {
			echoSite($site);
		}
	} else {*/
	// Update single site
	QueryBuilder::create(SQL::getConnection())
		->withQuery("SELECT display_name, folder_name, executable FROM websites WHERE id = ?")
		->withParam($webId, QueryBuilder::PARAM_TYPE_INT)
		->build()
		->forEachResult(function ($row) {
			$starter = new Startables(0, $row['display_name'], $row['folder_name']);
			echoStart($starter);
		});
}

