<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" context="text/html; charset=UTF-8">
	<title>お友達リスト</title>	
</head>
<body>
<br/ >

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

	$sql ='SELECT * FROM `area_table` WHERE id='.$_GET['id'];
	$stmt =$dbh->prepare($sql);
	$stmt->execute();
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	echo $rec['name'];
	//var_dump($_GET['id']);
	echo 'のお友達は';
	echo '<br />';
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
	$password ='';
	
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');

	$sql ='SELECT * FROM `friends_table` WHERE area_table_id='.$_GET['id'];
	$stmt =$dbh->prepare($sql);
	$stmt->execute();
	
	echo '<ul>';

		while(1){
				$friends = $stmt->fetch(PDO::FETCH_ASSOC);
				if($friends==false){
					break;
					}
				
				//var_dump($friends);
				echo '<li>';
				echo $friends['name'];
				echo '<form method="post" action="henshu.php">';
				echo '<input type="button" value="編集" onclick="location.href=\'henshu.php?id='.$friends['id'].'\'">';
				echo '<input type="button" value="削除" onclick="location.href=\'sakujo.php?id='.$friends['id'].'\'">';
				echo '</form>';
				echo '</li>';
				
				}

	$dbh = null;


echo '</ul>';

echo '<form method="post" action="tuika.php">';
echo '<input type="hidden" name="area_table_id" value="'.$_GET['id'].'">';
echo '<input type="submit" value="友達の追加">';
echo '</form>';


?>	

</body>
</html>