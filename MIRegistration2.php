<?php
      session_start();
      $s_code = $_SESSION['s_code'];
      $g_name = $_POST['g_name'];
      $g_exp = $_POST['g_exp'];
      $g_pri = $_POST['g_pri'];
      $aaa = 0;

      $con = mysql_connect('172.20.17.202', 'admin', '1111');
      if(!$con){
        exit('�f�[�^�x�[�X�ɐڑ��ł��܂���ł����B');
      }
      $result = mysql_select_db('riceshop', $con);
        if(!$result){
          exit('�f�[�^�x�[�X��I���ł��܂���ł����B');
        }
      $result = mysql_query('SET NAMES utf8', $con);
      if(!$result){
        exit('�����R�[�h���w��ł��܂���ł����B');
      }



      $sqlstr = "INSERT INTO goods (g_s_code,g_name,g_exp,g_phot,g_pri)" .
                " VALUES (" . $s_code . ",'" . 
                             $g_name . "','" . 
                             $g_exp . "','" . 
                             $aaa . "','" . 
                             $g_pri . ")";
      echo $sqlstr;

      $result = mysql_query($sqlstr);
      if (!$result) {
        print('�N�G���[�����s���܂����B'.mysql_error());
      }else{
        print('�N�G���[���������܂����B');
      }
      
      $_SESSION['g_code'] = mysql_insert_id();
      $code = $_SESSION['g_code'];

if (is_uploaded_file($_FILES["g_phot"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["g_phot"]["tmp_name"], "gazou/" . $_FILES["g_phot"]["name"])) {
    chmod("gazou/" . $_FILES["g_phot"]["name"], 0644);
    echo $_FILES["g_phot"]["name"] . "���A�b�v���[�h���܂����B";
  } else {
    echo "�t�@�C�����A�b�v���[�h�ł��܂���B";
  }
} else {
  echo "�t�@�C�����I������Ă��܂���B";
}


      $con = mysql_close($con);
      if(!$con){
        exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
      }
      //header('Location: http://172.20.17.202/kome/MIRegistration3.php');




?>