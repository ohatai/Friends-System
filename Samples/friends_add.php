<?php
//1.データベースに接続する
$dsn = 'mysql:dbname=FriendsDB;host=localhost';
$user = 'root';
$password = 'mangoshake';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');
if (isset($_POST['name'])){
	echo 'POST送信された！';
	
	//Insert文
	$sql = "INSERT INTO `FriendsDB`.`friends_table` (`id`, `area_table_id`, `name`, `gender`, `age`) ";
	$sql .= "VALUES (NULL, '".$_POST['area_table_id']."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['age']."');";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	//処理が全て終わった後、都道府県一覧に戻る
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/friends/index.php');
}else{
	echo 'POST送信されてない';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>FriendsSystem</title>
</head>
<body>
	<?php
	//2.SQLで指令をだす
		$sql = 'SELECT * FROM `area_table`';
		//echo $sql;
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
	?>
	<h2>お友達の追加</h2>
	<form method="post" >
		名前
		<input name="name" type="text" style="width:100px;height:30px;" maxlength="20" value=<?php echo $rec['name']; ?>><br />
		出身
		<select name="area_table_id">
			<?php
				while(1){
					$rec = $stmt->fetch(PDO::FETCH_ASSOC);
					if ($rec == false){
						break;
					}
					echo '<option value="'.$rec['id'].'">';
					echo $rec['name'];
					echo '</option>';
				}
			?>
		</select><br />
		性別
		<select name="gender">
			<option value="男">男性</option>
			<option value="女">女性</option>
		</select><br />
		年齢
		<input name="age" type="text" style="width:100px;height:30px;" maxlength="10"><br />

		<br />		
		<input type="submit" value="保存" >
	</form>
</body>
</html>
