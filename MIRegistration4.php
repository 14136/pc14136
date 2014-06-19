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


  // 画像データ取得
$sql = "SELECT g_phot FROM goods WHERE g_code = " . $_GET['id'];
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


// 画像ヘッダとしてjpegを指定（取得データがjpegの場合）
header("Content-Type: image/jpg");
// バイナリデータを直接表示
echo $row['g_phot'];





  //$result = mysql_query($sqlstr);
  //$data = mysql_fetch_array($result);
  /*while( $row = mysql_fetch_assoc($rs) ){
  //  switch( strtolower($row['EXT']) ){
  //    case 'jpg' :
  //    case 'jpeg':
  //      $contentType = 'image/jpeg';
  //      break;
  //    case 'gif':
  //      $contentType = 'image/gif';
  //      break;
  //    case 'bmp':
  //      $contentType = 'image/bmp';
  //      break;
  //    case 'png':
  //      $contentType = 'image/png';
  //      break;
  //  }

    $data = $row['IMG_DATA'];
    $size = $row['IMG_SIZE'];
  }
  mysql_free_result($rs);
  mysql_close($link);

  header( "Content-Type: " . $contentType );
  header( "Content-Disposition: inline;");
  header( "Content-Transfer-Encoding: binary");
  header( "Content-Length: ". $size );
  echo( $data );
  */
  $con = mysql_close($con);
  if(!$con){
    exit('データベースとの接続を閉じられませんでした。');
  }
?>