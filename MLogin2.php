﻿<?php
  $m_code = $_POST['m_code'];
  $m_pass = $_POST['m_pass'];
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

  $result = mysql_query("SELECT m_code FROM member WHERE m_code = ". $m_code . " and m_pass = " . $m_pass , $con);
  if (mysql_num_rows($result) == 1){
    header('Location: http://172.20.17.202/kome/m_mainmenu.php');
  }else{
    header('Location: http://172.20.17.202/kome/LoginFailure.php');
  }

  $con = mysql_close($con);
  if (!$con) {
    exit('データベースとの接続を閉じられませんでした。');
  }
?>
