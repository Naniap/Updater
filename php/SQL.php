<?php

/**
 * Provides a simple singleton connection to the database.
 */
class SQL {
	const HOST = "localhost";
	const DATABASE = "updater";
	const USERNAME = "updater";
	private static $pw = "THIS IS THE BEST PASSWORD EVER LOL";
	
	/**
	 * Uninstantiable
	 */
	private function __construct() {}
	
	private static $connection = null;
	/**
	 * Gets a connection to the MySQL database.
	 * @throws mysqli_sql_exception
	 * @return mysqli
	 */
	public static function getConnection() {
		if (is_null(SQL::$connection)) {
			SQL::$connection = new mysqli(SQL::HOST, SQL::USERNAME, SQL::$pw, SQL::DATABASE);
			SQL::$connection->set_charset('utf8');
		}
		if (SQL::$connection->connect_error)
			throw new mysqli_sql_exception("Failed to connect to database: " . SQL::$connection->connect_error);
		return SQL::$connection;
	}
	/**
	 * I mean... It's hard to not understand what this does.
	 * @return QueryBuilder
	 */
	public static function createQueryBuilder() {
		self::getConnection();
		return QueryBuilder::create(self::$connection);
	}
}
