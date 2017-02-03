<?php
//1. POSTデータ取得
$mem_id   = $_POST["mem_id"];

//2. DB接続します（ここはコピペ。）レンタルサーバーの場合はhostはサーバーのmysqlのアドレス。root,空欄の部分はxammpの場合。tryはエラーが出たらcatchで拾ってくれる。エラーを表示したくないときは、exir(空欄)にする
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

$sql = "UPDATE member_list SET now = :now WHERE id = :id";
$stmt = $pdo->prepare($sql);
$params = array(':now' => '退館中', ':id' => $mem_id);
$status = $stmt->execute($params);


//４．データ登録処理後。基本はこのまま。エラーを表示したくない場合のみ若干操作するかも。
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト.半角スペースが入る。header使ったらexitを使うのが風習。
  header("Location: index.php");
  exit;

}
?>
