 <html>
<head>
<title>商品検索結果</title>
<meta http-equiv="Content-Type" content="text/html; charset=UFC-8">
</head>
<body>
<?php
$debug = false;

//DB接続
mysql_connect("127.20.17.202","riceshop","");
mysql_select_db("goods");

if($debug) print_r($HTTP_POST_VARS);

//エラーチェック
 //リクエストメソッドチェック
if($REQUEST_METHOD != "POST") {
 print $REQUEST_METHOD;
 print "Error: invalid method";
 exit();
}

//クエリ生成
$query = "SELECT * FROM search ";

//検索条件生成
 //商品番号
 if(!empty($g_code)) {
  $g_code = addslashes($g_code);
  $where = "g_code = '$g_code' && ";
 }
 //商品販売者番号
 if(!empty($g_s_code)) {
  $g_s_code = addslashes($g_s_code);
  $where .= "g_s_code REGEXP '$g_s_code' && ";
 }
 //商品名
 if(!empty($g_name)) {
  $g_name = addslashes($g_name);
  $where .= "g_name = '$g_name' && ";
 }
 if(!empty($where)) {
 $where = substr($where, 0, -4);
 $where = "WHERE " . $where;
}
$query .= $where;
if($debug) {
 print "<BR><BR>";
 print $query;
}

$result = mysql_query($query);
$num_rows = mysql_num_rows($result);

if($num_rows == 0) $message = "該当するデータはありませんでした";
else $message = $num_rows . "件ヒットしました";
?>
検索結果<br>
<?=$message?>
<table border=1>
<tr><td>商品番号</td><td>商品販売者番号</td><td>商品名</td></tr>
<?php while($row = mysql_fetch_assoc($result)): ?>
<tr><td><?=$row[g_code]?></td><td><?=$row[g_s_code]?></td><td><?=$row[g_name]?></td>
</tr>
<?php endwhile; ?>
</table>
<a href="g_search.html">再検索</a>
</body>
</html>
  