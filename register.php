<?php
/**
 * Created by PhpStorm.
 * User: router
 * Date: 10/17/14
 * Time: 3:07 PM
 */

class database extends SQLite3 {
	function  __construct() {
		$this->open('mydb.db');
	}
}
$db = new database();
if( !$db ) {
	echo $db->lastErrorMsg();
} else {
	echo "opened successfully";
}
$sql = "CREATE TABLE `REGISTRATION` ( NAME TEXT, AGE INT )";
$ret = $db->exec( $sql );
if ( !$ret ) {
	$db->lastErrorMsg();
} else {
	echo "Successfully written";
}

if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
	$name = $_POST['name'];
	$age = $_POST['age'];

	$sqlInsert= "INSERT INTO `REGISTRATION` VALUES ( '$name', '$age' )";

	$return = $db->exec( $sqlInsert );
	if ( !$return ) {
		echo $db->lastErrorMsg();
	} else {
		echo "Success!";
	}

}
?>