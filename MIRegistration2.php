<?php
      session_start();

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


      //実際にテンポラリファイルを開く
$fp = fopen( $_FILES['g_phot']['tmp_name'], 'rb');

//ファイルサイズを取得する
$size = filesize($_FILES['g_phot']['tmp_name']);

//ファイルをバイナリ・モードで読み込む
$imgdata = fread( $fp, $size );

//ファイルを閉じる
fclose($fp);

      $result = mysql_query("INSERT INTO goods (g_s_code,g_name,g_exp,g_phot,g_pri)" .
                             "VALUES (" . $_SESSION['s_code'] . ",'" . 
                                               $_POST['g_name'] . '","' . 
                                               $_POST['g_exp'] . '"," . 
                                               $imgdata . "," . 
                                               $_POST['g_pri'] . ");");
      if (!$result) {
        die('クエリーが失敗しました。'.mysql_error());
      }
      
      $_SESSION['s_g_code'] = mysql_insert_id();

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }
      header('Location: http://172.20.17.202/kome/MIRegistration3.php');




?>