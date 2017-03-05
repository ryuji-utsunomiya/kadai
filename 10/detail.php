<?php
$id = $_GET["id"];
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM member_list WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);//POD以降はセキュリティ厳しくする場合。INT or STR
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $res = $stmt->fetch();//1レコード取得する書き方
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会員情報の編集</title>
 <link rel="stylesheet" type="text/css" href="css/style3.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="index.php">会員情報の編集</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="">
     <label>名前：<input type="text" name="name" value="<?=$res["name"]?>"></label><br>
     <label>会社：<input type="text" name="company" value="<?=$res["company"]?>"></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$res["age"]?>"></label><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="決定">

  </div>
</form>

<!-- Main[End] -->


</body>
</html>
