<?php
      session_start();
      $s_code = $_SESSION['s_code'];
      $g_name = $_POST['g_name'];
      $g_exp = $_POST['g_exp'];
      $g_pri = $_POST['g_pri'];

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
/*
      $fp = fopen($_FILES["g_phot"]["tmp_name"], "rb");
      $g_phot = fread($fp, filesize($_FILES["g_phot"]["tmp_name"]));
      fclose($fp);
      $g_phot = addslashes($g_phot);
/*
      $upfile = $_FILES["g_phot"]["tmp_name"];
      $g_phot = file_get_contents($upfile);
      $g_phot = mysql_real_escape_string($g_phot);
*/


      // 画像の取得
      $img_file = file_get_contents( $_FILES["g_phot"]["tmp_name"] );

 

	//画像をバイナリに変換
	$img_binary = mysqli_real_escape_string($img_file );
	


	


      $sqlstr = "INSERT INTO goods (g_s_code,g_name,g_exp,g_phot,g_pri)" .
                "VALUES (" . $s_code . ",'" . 
                             $g_name . "','" . 
                             $g_exp . "','" . 
                             $img_binary . "'," . 
                             $g_pri . ")";

      //print($sqlstr);

      //$result = mysql_query("INSERT INTO goods (g_s_code,g_name,g_exp,g_phot,g_pri)" .
      //                       "VALUES (" . $s_code . ",'" . 
       //                                        $g_name . "','" . 
         //                                      $g_exp . "'," . 
           //                                    $g_phot . "," . 
             //                                  $g_pri . ")");
      $result = mysql_query($sqlstr);
      if (!$result) {
        print('クエリーが失敗しました。'.mysql_error());
      }else{
        print('クエリーが成功しました。');
      }
      
      $_SESSION['g_code'] = mysql_insert_id();

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }
      header('Location: http://172.20.17.202/kome/MIRegistration3.php');




?>