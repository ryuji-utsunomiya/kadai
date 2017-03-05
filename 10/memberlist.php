
<?php

////会員リストを表示する部分
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM member_list");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<p>'.$res["id"]." / ".$res["name"]." / ".$res["company"];
    $view .='<a href="detail.php?id='.$res["id"].'">';
    $view .= '  ';
    $view .= " [編集] ";
    $view .= '</a>'."/";
    $view .= '<a href="delete.php?id='.$res["id"].'">';
    $view .= " [削除] ";
    $view .= '</a>';
    $view .= "</p>";

  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会員リスト</title>
<link rel="stylesheet" type="text/css" href="css/style3.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <div id="top_box2"><a id="" href="index.php">ホームへ</a></div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
    <div id = "background_1"><?=$view?></div>
<!-- Main[End] -->


</body>
</html>
