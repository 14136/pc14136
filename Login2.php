<?php
  $m_code = $_POST['m_code'];
  $m_pass = $_POST['m_pass']
  $con = mysql_connect('172.20.17.202','admin','1111');
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

  $result = mysql_query("SELECT count FROM member WHERE m_code = $m_code and m_pass = $m_pass" , $con);
  if ($result == 1){
    header('Location: https://www.google.co.jp/
  }else{
    header('Location: http://172.20.17.202/kome/LoginFailure.php');
  }

  $con = mysql_close($con);
  if (!$con) {
    exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
  }
?>
