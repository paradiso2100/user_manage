<?php
class DbConnect {

	const DSN = "mysql:host=localhost;dbname=user_manage;charset=utf8";
	const DBUSER = "root";
	const DBPASS = "";
	private static $pdo;

	public static function getDbConnection(){

		if(isset(SELF::$pdo)) {
			return SELF::$pdo;
		}

		// DBに接続
		SELF::$pdo= new PDO(SELF::DSN, SELF::DBUSER, SELF::DBPASS);
		SELF::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return SELF::$pdo;
	}
}
?>