<?php
      session_start();
      $s_code = $_SESSION['s_code'];
      $g_name = $_POST['g_name'];
      $g_exp = $_POST['g_exp'];
      $g_pri = $_POST['g_pri'];

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


      //���ۂɃe���|�����t�@�C�����J��
      $fp = fopen( $_FILES['g_phot']['tmp_name'], 'rb');

      //�t�@�C���T�C�Y���擾����
      $size = filesize($_FILES['g_phot']['tmp_name']);

      //�t�@�C�����o�C�i���E���[�h�œǂݍ���
      $g_phot = fread( $fp, $size );

      //�t�@�C�������
      fclose($fp);


      $sqlstr = "INSERT INTO goods (g_s_code,g_name,g_exp,g_phot,g_pri)" .
                "VALUES (" . $s_code . ",'" . 
                             $g_name . "','" . 
                             $g_exp . "','" . 
                             mysql_real_escape_string($g_phot) . "'," . 
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
        print('�N�G���[�����s���܂����B'.mysql_error());
      }else{
        print('�N�G���[���������܂����B');
      }
      
      $_SESSION['g_code'] = mysql_insert_id();

      $con = mysql_close($con);
      if(!$con){
        exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
      }
      header('Location: http://172.20.17.202/kome/MIRegistration3.php');




?>