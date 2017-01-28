<html>
<head>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<p>データベースの検索を行います</p>
</head>
<body>

	会員証番号：<input type="text" name="number" id="mem_number"><br>
<!--    氏名（カナ）：<input type="text" name="kana_name"><br>-->
	<input type="submit" id = "search_btn" value="検索">
<form action="index.php" method="post">
        <input type="text" name="search_result"><br>
	<input type="submit" id = "entry" value="入館"><br>
    </form>
<!--
    <input type="submit" value="退館">
-->
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>

<script>
  $("#search_btn").on("click",function(){
        var num = document.getElementById("mem_number");
        console.log(num);
        
    });

    
</script>

<!--

//in_array (検索値, 検索対象配列);

$ar = array("PHP", "CGI", "PERL");
if(in_array("PHP", $ar)){
echo "配列にPHPは存在します。";
}
-->



</html>