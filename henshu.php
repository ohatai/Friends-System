<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" context="text/html; charset=UTF-8">
	<title>編集画面</title>	
</head>
<body>
<?php

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
	$sql ='SELECT * FROM `friends_table` WHERE id='.$_GET['id'];
	$stmt =$dbh->prepare($sql);
	$stmt->execute();
	$rec_f = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$id = $rec_f['id'];
	$area_table_id = $rec_f['area_table_id'];
	$name = $rec_f['name'];
	$gender = $rec_f['gender'];
	$age = $rec_f['age'];


	//header('location:friends.php');

		echo '<form method="post" action="">';
		echo '名前の修正<br />';
		echo '<input name="name" type="text" style="width:200px" value="'.$name.'"><br />';
		echo '性別の修正<br />';
		echo '<select name ="gender">';
		echo '<option value="男" selected>男</option>';
		echo '<option value="女" selected>女</option>';
		echo '</select name><br />';
		echo '年齢の修正<br />';
		echo '<input name="age" type="text" style="width:200px" value="'.$age.'"><br />';
		echo '<input type="hidden" name="area_table_id" value="'.$area_table_id.'">';
		echo '<input type="submit" value="完了"><br />';
		echo '</form>';

	$dbh = null;

?>
<?php
// 仮想サーバーの時は
// $dsn = 'mysql:dbname=Friends System;host=localhost';
// $user = 'root';
// $password ='mysql';
// Xamppの時は
$dsn = 'mysql:dbname=Friends System;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');
	if (isset($_POST['name'])){
		echo '修正されました';
		
		
		$sql = "UPDATE `friends_table` SET `name` = '".$_POST['name']."',`gender` = '".$_POST['gender']."',`age` = '".$_POST['age'];
		$sql .= "' WHERE `id` = ".$_GET['id'];
		
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		
		//header('Location: friends.php'&area_table_id=$area_table_id);
	}
	else{
		echo 'まだ修正されていません';
	}
?>

</body>
</html>