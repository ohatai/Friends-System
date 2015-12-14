<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" context="text/html; charset=UTF-8">
	<title>追加画面</title>	
</head>
<body>
<?php

	if(isset($_POST['name'],$_POST['gender'],$_POST['age'])){

		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$age=$_POST['age'];
		

	}

	$area_table_id=$_POST['area_table_id'];

	// 仮想サーバーの時は
	// $dsn = 'mysql:dbname=Friends System;host=localhost';
	// $user = 'root';
	// $password ='mysql';
	// Xamppの時は
	$dsn = 'mysql:dbname=Friends System;host=localhost';
	$user = 'root';
	$password ='';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');


	if(isset($name)){

	$sql ='INSERT INTO `friends_table` (id, area_table_id, name, gender, age) VALUES("","'.$area_table_id.'","'.$name.'","'.$gender.'","'.$age.'")';
	$stmt =$dbh->prepare($sql);
	$stmt->execute();
	

	$dbh = null;

	}

	echo '<form method="post" action="">';
	echo 'お友達の名前<br />';
	echo '<input name="name" type="text" style="width:200px"><br />';
	echo 'お友達の性別<br />';
	echo '<select name ="gender">';
	echo '<option value="男">男</option>';
	echo '<option value="女">女</option>';
	echo '</select name><br />';
	echo 'お友達の年齢<br />';
	echo '<input name="age" type="text" style="width:200px"><br />';
	echo '<input type="hidden" name="area_table_id" value="'.$area_table_id.'">';
	echo '<input type="submit" value="完了"><br />';
	echo '</form>';
?>

</body>
</html>