<?php
  session_start();
  $s_code = $_POST['s_code'];
  $s_pass = $_POST['s_pass'];
  $con = mysql_connect('172.20.17.202','admin','1111');
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

  $result = mysql_query("SELECT s_code,s_name,s_comp FROM s_member WHERE s_code = ". $s_code . " and s_pass = " . $s_pass , $con);
  if (mysql_num_rows($result) == 1){
    $row = mysql_fetch_assoc($result);
    $_SESSION['s_code'] = $row['s_code']
    $_SESSION['s_name'] = $row['s_name']
    $_SESSION['s_comp'] = $row['s_comp']
    header('Location: http://172.20.17.202/kome/SMemberMenu.php');
  }else{
    header('Location: http://172.20.17.202/kome/LoginFailure.php');
  }

  $con = mysql_close($con);
  if (!$con) {
    exit('データベースとの接続を閉じられませんでした。');
  }
?>
