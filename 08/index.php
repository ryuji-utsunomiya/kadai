<?php

////入館中の会員を表示する部分

try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM member_list where now = '入館中'");
$status = $stmt->execute();

$view2="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view2 .='<p>'.$res["id"]." / ".$res["name"]." / ".$res["company"].'</p>';
  }//文字を接続するために。しないと、最後のしか残らない。
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ホーム???</title>
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>div{padding: 10px;font-size:16px;}</style>
<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<!-- Head[Start] -->
<header>
   <img src="image/paak.png" alt="トップ画像" id="top_img">
    <div class="navi">
        <div class="box1"><a href="index.php" style="text-decoration:none;">Home</a></div>
        <div class="box1"><a href="register.php" style="text-decoration:none;">会員登録</a></div>
        <div class="box1"><a href="memberlist.php" style="text-decoration:none;">会員リスト</a></div>
        <div class="box1"><a href="http://techlabpaak.com" style="text-decoration:none;">公式サイト</a></div>
    </div>

    
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<body id="main">
<div>
    <div >入退館</div>
    <div id="background_1">
    <form method="post" action="insert2.php" id="form1">
        <div >
            <label>会員番号：<input type="text" name="id"></label>
            <input type="submit" value="入館" >
        </div>
    </form>
    <form method="post" action="insert3.php" id = "background_1">
        <div >
            <label>会員番号：<input type="text" name="id"></label>
            <input type="submit" value="退館" >
        </div>
    </form>
</form>
</div>
</div>
 
  <div>いまいるメンバー</div>
    <div id = "background_1"><?=$view2?></div>
</div>
<!-- Main[End] -->

</body>
</html>
