﻿<?php
      session_start();
      if($_SESSION['s_name'] == null){
       header('Location: http://172.20.17.202/kome/SLogin.php');
      }

      $con = mysql_connect('172.20.17.202', 'admin', '1111');
      if(!$con){
        exit('データベースに接続できませんでした。');
      }
      $result = mysql_select_db('riceshop', $con);
        if(!$result){
          exit('データベースを選択できませんでした。');
        }
      $result = mysql_query('SET NAMES utf8', $con);
      if(!$result){
        exit('文字コードを指定できませんでした。');
      }

      if(isset($_POST['sumi'])){
        for($i = 0; $i < count($_POST['h_code']) ; $i++){
          $result = mysql_query('UPDATE history SET h_pri = 1 WHERE h_code = ' . $_POST['h_code'][$i] );
          if (!$result) {
            die('クエリーが失敗しました。'.mysql_error());
          }
        } 
      }elseif(isset($_POST['mi'])){
        for($i = 0; $i < count($_POST['h_code']) ; $i++){
          $result = mysql_query('UPDATE history SET h_pri = 0 WHERE h_code = ' . $_POST['h_code'][$i] );
          if (!$result) {
            die('クエリーが失敗しました。'.mysql_error());
          }
        } 
      }
      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }
      header('Location: http://172.20.17.202/kome/OHCheck.php');
?>

<!--
UPDATE history SET h_pri
WHERE h_code = 1;
-->