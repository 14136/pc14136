<?php
  $s_code = $_POST['s_code'];
  $s_pass = $_POST['s_pass'];
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

  $result = mysql_query("SELECT s_code FROM s_member WHERE s_code = ". $s_code . " and s_pass = " . $s_pass , $con);
  if (mysql_num_rows($result) == 1){
    header('Location: https://172.20.17.202/kome/SMemberMenu.php');
  }else{
    header('Location: http://172.20.17.202/kome/LoginFailure.php');
  }

  $con = mysql_close($con);
  if (!$con) {
    exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
  }
?>
