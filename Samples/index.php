<?php
//1.データベースに接続する test
$dsn = 'mysql:dbname=FriendsDB;host=localhost';
$user = 'root';
$password = 'mangoshake';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>FriendsSystem</title>
</head>
<body>
	<?php //echo $_SERVER['HTTP_USER_AGENT']; ?>
	都道府県一覧
	<?php
		//2.SQLで指令をだす
		
		$sql ='SELECT area_table.*,count(friends_table.id) AS `friends_cnt` ';
		$sql .='FROM area_table LEFT OUTER JOIN friends_table ';
		$sql .= 'ON area_table.id = friends_table.area_table_id ';
		$sql .= 'GROUP BY area_table.id';
		//echo $sql;
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		echo '<table style="border:1px;">';
		while(1){
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($rec == false) {
				break;
			}
			echo '<tr>';
			echo '<td>'.$rec['id'].'</td>';
			echo '<td><a href="friends_list.php?id='.$rec['id'].'">'.$rec['name'].'</a></td>';
			echo '<td>'.$rec['friends_cnt'].'</td>';
			echo '</tr>';
		}
		echo '</table>';
		//3.データベースから切断する
		$dbh=null;
	?>
	<br />
</body>
</html>