<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ログイン</title>
</head>
<body>
<?php

$con = mysql_connect('172.20.17.202', 'admin', '1111');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('riceshop', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$result = mysql_query('SELECT * FROM member', $con);
while ($data = mysql_fetch_array($result)) {
  echo '<p>' . $data['no'] . ':' . $data['name'] . ':' . $data['tel'] . "</p>\n";
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
</body>
</html>