<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>���O�C��</title>
</head>
<body>
<?php

$con = mysql_connect('172.20.17.202', 'root', '1234');
if (!$con) {
  exit('�f�[�^�x�[�X�ɐڑ��ł��܂���ł����B');
}

$result = mysql_select_db('riceshop', $con);
if (!$result) {
  exit('�f�[�^�x�[�X��I���ł��܂���ł����B');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('�����R�[�h���w��ł��܂���ł����B');
}

$result = mysql_query('SELECT * FROM member', $con);
while ($data = mysql_fetch_array($result)) {
  echo '<p>' . $data['no'] . ':' . $data['name'] . ':' . $data['tel'] . "</p>\n";
}

$con = mysql_close($con);
if (!$con) {
  exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
}

?>
</body>
</html>