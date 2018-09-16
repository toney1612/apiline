<?php
	$mysqli = new mysqli('localhost','root','12345678','linemember');
	if ($mysqli->connect_error) {
    	die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }

	$result = $mysqli->query("select * from member");
	foreach ($result as $val) {
		echo $val['idLine']."<br>";
		echo $val['studentId']."<br>";
		echo $val['studentName'];
	}

	$mysqli->close();
?>