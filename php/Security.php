<?php

/**
 * Created by PhpStorm.
 * User: Kodlee Yin
 * Date: 6/29/2015
 * Time: 11:45 PM
 */
class Security {
	private static $ALLOWED_IPS = array(
		"127.0.0.1",		// Wowe
		"24.90.37.219",		// Rental home
		"::1",
		"2601:19b:4300:7b24:95d3:53be:715a:1de2",
		"71.233.166.165",
		"199.204.186.54"
	);

	/**
	 * Returns whether user is allowed to view page.
	 * @return bool
	 */
	public static function hasPermission() {
		return in_array($_SERVER['REMOTE_ADDR'], self::$ALLOWED_IPS);
	}
}