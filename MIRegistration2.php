<?php
      session_start();
      if($_SESSION['s_name'] == null){
       header('Location: http://172.20.17.202/kome/SLogin.php');
      }
?>
<?php
      session_start();
      $s_code = $_SESSION['s_code'];
      $g_name = $_POST['g_name'];
      $nenndo = $_POST['nenndo'];
      $g_exp = $_POST['g_exp'];
      $g_pri = $_POST['g_pri'];
      $g_name = $g_name . $nenndo;
      $aaa = 'gazou/noimage.jpg';

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



      $sqlstr = "INSERT INTO goods (g_s_code,g_name,g_exp,g_phot,g_pri)" .
                " VALUES (" . $s_code . ",'" . 
                             $g_name . "','" . 
                             $g_exp . "','" . 
                             $aaa . "'," . 
                             $g_pri . ")";


      $result = mysql_query($sqlstr);
      if (!$result) {
        print('クエリーが失敗しました。'.mysql_error());
      }else{
        print('クエリーが成功しました。');
      }



      
      $_SESSION['g_code'] = mysql_insert_id();
      if (is_uploaded_file($_FILES["g_phot"]["tmp_name"])) {
        $fileinfo = pathinfo($_FILES["g_phot"]["name"]);
        $fileext = strtoupper($fileinfo["extension"]);
        $gazoumei = $_SESSION['g_code'] . '.' . $fileext;
        $_FILES["g_phot"]["name"] = $gazoumei;
      
        if (move_uploaded_file($_FILES["g_phot"]["tmp_name"], "gazou/" . $_FILES["g_phot"]["name"])) {
          chmod("gazou/" . $_FILES["g_phot"]["name"], 0644);
          echo $_FILES["g_phot"]["name"] . "をアップロードしました。";
        } else {
          echo "ファイルをアップロードできません。";
        }

        $result = mysql_query('UPDATE goods SET g_phot = "gazou/' . $gazoumei . '" WHERE g_code = ' . $_SESSION['g_code'] );
        if (!$result) {
          die('クエリーが失敗しました。'.mysql_error());
        }
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }
      header('Location: http://172.20.17.202/kome/MIRegistration3.php');

?>