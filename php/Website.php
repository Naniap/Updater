<?php

/**
 * Class Website
 * Simple container class for a website on my server
 */
class Website {
	/** @var Website[] All mah websites */
	private static $allWebsites;

	public static function getAllWebsites() {
		if (is_null(self::$allWebsites) || !is_array(self::$allWebsites)) {
			self::$allWebsites = array();
			QueryBuilder::create(SQL::getConnection())
				->withQuery("SELECT id, display_name, folder_name FROM websites")
				->build()
				->forEachResult(function($row) {
					self::$allWebsites[] = new Website($row['id'], $row['display_name'], $row['folder_name']);
				});

			if (count(self::$allWebsites) == 0)
				throw new Exception("You suck.");
		}
		return self::$allWebsites;
	}

	/** @var integer */
	private $id;
	/** @var string The display name for the site */
	private $name;
	/** @var string The file path to the site */
	private $folderName;

	public function __construct($id, $name, $folderName) {
		$this->id = $id;
		$this->folderName = $folderName;
		$this->name = $name;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * @return string
	 */
	public function getFolderName() {
		return $this->folderName;
	}

	/**
	 * Updates the given website and returns the command line result
	 * @return string
	 * @throws Exception Thrown if directory does not exist
	 */
	public function update() {
		$fullDirectory = $this->folderName;
		if (!file_exists($fullDirectory))
			throw new Exception("No site found");
		chdir($fullDirectory);
		return shell_exec("git pull" );
	}
}
