<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" context="text/html; charset=UTF-8">
	<title>削除画面</title>	
</head>
<body>
<?php
	
	$delete_id=$_GET['id'];
	var_dump($delete_id);

	if(isset($delete_id)){

		
	}
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

		$sql ='DELETE FROM `friends_table` WHERE id='.$delete_id;
		$stmt =$dbh->prepare($sql);
		$stmt->execute();
		
		$dbh = null;
 
		echo 'ID='.$delete_id.' のお友達を削除しました';
		echo '<form>';
		echo '<input type="button" value="戻る" onclick="location.href=area.php>';
		echo '</form>';	

?>

</body>
</html>