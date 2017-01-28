<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登録完了</title>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
   <p>下記の内容で登録が完了しました。</p>
    
<?php
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $company = $_POST["company"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];

    $str = $name.",".$mail.",".$company.",".$age.",".$sex."\n";
    $file = fopen("data/data.txt","a");	// ファイル読み込み
    flock($file, LOCK_EX);			// ファイルロック
    fwrite($file, $str);//."\"は改行コード
    flock($file, LOCK_UN);			// ファイルロック解除
    fclose($file);
?>
   
    <p>お名前: <?=$name?></p>
    <p>EMAIL: <?=$mail?></p>
    <p>会社名: <?=$company?></p>
    <p>年齢: <?=$age?></p>
    <p>性別: <?=$sex?></p>

<!--
<form action = "new" method="post">
    <button>続けて登録</button>
</form>
-->
<form action = "index.php" method="post">
    <button>トップに戻る</button>
</form>

    
</body>
</html>

