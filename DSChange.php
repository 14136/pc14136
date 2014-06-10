<?php
      $h_code = $_POST['h_code'];
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

      for($i = 0; $_POST['h_code'][$i] < count($h_code) ; $i++){
        $sql = sprintf('UPDATE history SET h_pri = 1' . 
                       'WHERE h_code = ' . $_POST['h_code'][$i] );

        $result_flag = mysql_query($sql);

        if (!$result_flag) {
        die('UPDATEクエリーが失敗しました。'.mysql_error());
        }
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }


?>

<!--
UPDATE history SET h_pri
WHERE h_code = 1;
-->