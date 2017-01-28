<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
書き込みを行います。<br>


<?php
$str = $name",".$mail",".$company",".$age",".$sex"\n";
$file = fopen("data/data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fwrite($file, $str);//."\"は改行コード
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>
<ul>
    <li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>