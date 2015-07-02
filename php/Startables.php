<?php

class Startables {
	/** @var Startables[] gotta be a starter y'know?*/
	private static $startables;
	public static function getAllStartables()
	{
		if (is_null(self::$startables) || !is_array(self::$startables)){
			self::$startables = array();
			QueryBuilder::create(SQL::getConnection())
				->withQuery("SELECT id, display_name, folder_name, executable FROM websites")
				->build()
				->forEachResult(function($row) {
					self::$startables[] = new Startables($row['id'], $row['display_name'], $row['folder_name'], $row['executable']);
				});
			if (count(self::$startables) == 0)
			{
				throw new Exception("lol");
			}
		}
		return self::$startables;
	}
	/** @var integer */
	private $id;
	/** @var string The display name for the site */
	private $name;
	/** @var string The file path to the site */
	private $folderName;
	/** @var string Name of executable */
	private $executable;

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
	 * @return string
	 */
	public function getExecutable() {
		return $this->executable;
	}

	public function start() {
		return shell_exec("dir");
	}
	public function stop() {

	}
	public function status() {

	}
}