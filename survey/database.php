<?php
global $conn;

$conn = @mysqli_connect('localhost','root','', 'survey');  /// connection with database. 
if (!$conn) { // if connection not established?
	die('Could not connect: ' . mysqli_error());  // show error if connection issue. 
}


function sanitizeData($data) /// filter the data before passed to the database//// sanitization process
{
    $data = htmlspecialchars($data); /// remove special characters
    $data = stripslashes($data); // strip slashes
    $data = trim($data); // remove extra spacess

	global $conn;

	$data = mysqli_real_escape_string($conn, $data); // filter for mysql 
    return $data;
}

function ins_upd_del($query) // insert and update function for database
{
	global $conn;
    mysqli_query($conn, $query);
	$result = mysqli_insert_id($conn);
	return $result;
}


function delete($query) // delete functon for database
{
	global $conn;
    return mysqli_query($conn, $query);
}

function getSingleRow($query) /// get single row from database
{
	global $conn;
	$re = mysqli_query($conn, $query);
	$re = mysqli_fetch_assoc($re);
	return $re;
}

function getMultipleRows($query) // get multiple rows from database in array form
{
	global $conn;
	$re = mysqli_query($conn, $query);
	$result = array();
	while($row = mysqli_fetch_assoc($re))
	{
		array_push($result, $row);
	}
	
	return $result;
}

function no_of_rows($query) // count no of rows in database 
{
	global $conn;
	$re = mysqli_query($conn, $query);
	$rows = mysqli_num_rows($re);
	return $rows;
}
?>

