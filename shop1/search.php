 <html>
<head>
<title>PHP SEARCH RESULT</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?
$debug = false;

//DB�ڑ�
//mysql_connect("127.0.0.1","sample","");
//mysql_select_db("sample");
require 'common.php';

//if($debug) print_r($HTTP_POST_VARS);

//�G���[�`�F�b�N
 //���N�G�X�g���\�b�h�`�F�b�N
if($REQUEST_METHOD != "POST") {
 print "Error: invalid method";
 exit();
}

//�N�G������
$query = "SELECT * FROM search ";

//������������
 //���O
 if(!empty($name)) {
  $name = addslashes($name);
  $where = "name = '$name' && ";
 }
 //�Z��
 if(!empty($address)) {
  $address = addslashes($address);
  $where .= "address REGEXP '$address' && ";
 }
 //����
 if(!empty($gender)) {
  $gender = addslashes($gender);
  $where .= "gender = '$gender' && ";
 }
 //�X�L��
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

if($num_rows == 0) $message = "�Y������f�[�^�͂���܂���ł���";
else $message = $num_rows . "���q�b�g���܂���";
?>
��������<br>
<?=$message?>
<table border=1>
<tr><td>���O</td><td>�Z��</td><td>����</td><td>�X�L��</td></tr>
<? while($row = mysql_fetch_assoc($result)): ?>
<tr><td><?=$row[name]?></td><td><?=$row[address]?></td><td><?=$row[gender]?></td><td><?=$row[skill]?></td></tr>
<? endwhile; ?>
</table>
<a href="input.html">�Č���</a>
</body>
</html>
  