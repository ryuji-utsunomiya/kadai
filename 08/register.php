






<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
<link rel="stylesheet" type="text/css" href="css/style3.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <div id="top_box2"><a id="" href="index.php">入館者リストへ</a></div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>新規会員登録</div>
    <form method="post" action="insert.php">
        <div class="jumbotron">
    <legend></legend>
     <label>氏名：<input type="text" name="name"></label><br>
     <label>会社名：<input type="text" name="company"></label><br>
     <label>年齢：<input type="text" name="age"></label><br>
     <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
     <input type="submit" value="送信">
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
