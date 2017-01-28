<html>
<head>
    <meta charset="utf-8">
    <title>トップページ</title>
     <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<p>ホームです。</p>
<p>入館者一覧</p>
    <div id="current_member"><?php
$file = file_get_contents('data/data.txt');
echo $file
?></div>
<ul>
    <li><a href="entry_check.php">入館手続き</a></li>
    <li><a href="dataform.php">会員登録</a></li>
    <li><a href="hairetsu.php">配列</a></li>
    <li><a href="kansu.php">関数</a></li>
</ul>

</body>



<!--
<script>
    window.onload = function(){
document.getElementById("current_member").textContent = "aaa";
};
    
</script>
-->

</html>