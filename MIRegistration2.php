<?php
      session_start();

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
      



      $upfile = $_FILES['g_phot']['tmp_name'];
      if ($upfile==""){
        print("�t�@�C���̃A�b�v���[�h���ł��܂���ł����B<BR>\n");
        exit;
      }

      // �t�@�C���擾
      $imgdat = addslashes(file_get_contents($upfile));
      //$imgdat = mysql_real_escape_string($imgdat);


      $result = mysql_query('INSERT INTO goods (g_code,g_s_code,g_name,g_exp,g_phot,g_pri) ' .
                             'VALUES (null,' . $_SESSION['s_code'] . ',' . 
                                               $_POST['g_name'] . ',' . 
                                               $_POST['g_exp'] . ',' . 
                                               $imgdat . ',' . 
                                               $_POST['g_pri'] . ')');
      if (!$result) {
        die('�N�G���[�����s���܂����B'.mysql_error());
      }
      
      $_SESSION['s_g_code'] = mysql_insert_id();

      $con = mysql_close($con);
      if(!$con){
        exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
      }
      header('Location: http://172.20.17.202/kome/MIRegistration3.php');




?>