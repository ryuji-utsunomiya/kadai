<html>
<head>
<meta charset="utf-8">
<title>データ登録フォーム</title>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<body>
<form action="confirm.php" method="post">
	お名前: <input type="text" name="name"><br>
	EMAIL: <input type="text" name="mail"><br>
	会社名: <input type="text" name="company"><br>
	年齢: <input type="text" name="age"><br>
	性別: <input type="text" name="sex"><br>
	<input type="radio" name="confirm" value="Yes">規約に同意します。<br>
	<input type="submit" id="submit" value="送信">
</form>
<ul>
    <li><a href="index.php">index.php</a></li>
</ul>




</body>
</html>