 <html>
<head>
<title>PHP SEARCH RESULT</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?
$debug = false;

//DB接続
//mysql_connect("127.0.0.1","sample","");
//mysql_select_db("sample");
require 'common.php';

//if($debug) print_r($HTTP_POST_VARS);

//エラーチェック
 //リクエストメソッドチェック
if($REQUEST_METHOD != "POST") {
 print "Error: invalid method";
 exit();
}

//クエリ生成
$query = "SELECT * FROM search ";

//検索条件生成
 //名前
 if(!empty($name)) {
  $name = addslashes($name);
  $where = "name = '$name' && ";
 }
 //住所
 if(!empty($address)) {
  $address = addslashes($address);
  $where .= "address REGEXP '$address' && ";
 }
 //性別
 if(!empty($gender)) {
  $gender = addslashes($gender);
  $where .= "gender = '$gender' && ";
 }
 //スキル
 if(!empty($skill)) {
  foreach($skill as $value) {
   $value = addslashes($value);
   $temp_where .= "skill REGEXP '$value' || ";
  }
  $temp_where = substr($temp_where, 0, -4);
  $where .= "(". $temp_where. ") && ";
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
<tr><td>名前</td><td>住所</td><td>性別</td><td>スキル</td></tr>
<? while($row = mysql_fetch_assoc($result)): ?>
<tr><td><?=$row[name]?></td><td><?=$row[address]?></td><td><?=$row[gender]?></td><td><?=$row[skill]?></td></tr>
<? endwhile; ?>
</table>
<a href="input.html">再検索</a>
</body>
</html>
  