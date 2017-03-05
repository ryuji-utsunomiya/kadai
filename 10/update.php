<?php
//1.POSTでParamを取得

$id     = $_POST["id"];
$name   = $_POST["name"];
$company  = $_POST["company"];
$age = $_POST["age"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。

$stmt = $pdo->prepare("UPDATE member_list SET name=:name,company=:company,age=:age WHERE id=:id");
$stmt->bindValue(':name', $name);
$stmt->bindValue(':company', $company);
$stmt->bindValue(':age', $age);
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．select.phpへリダイレクト
  header("Location: memberlist.php");
  exit;
}


?>
