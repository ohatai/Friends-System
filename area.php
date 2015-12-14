<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" context="text/html; charset=UTF-8">
	<title>都道府県リスト</title>	
</head>
<body>
	

	<ul>都道府県リスト//
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

		$sql ='SELECT * FROM `area_table` WHERE 1';
		$stmt =$dbh->prepare($sql);
		$stmt->execute();

		while(1){
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rec==false){
				break;
			}
			echo '<li>';
			echo '<a href="friends.php?id='.$rec['id'].'">';
			echo $rec['name'];
			//var_dump($rec);
			echo '</a>';
			echo '</li>';
		}

		$dbh = null;
		?>
	</ul>
</body>
</html>