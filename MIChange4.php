<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>���i���ύX</title>
  </head>
  <body>
    <p>���i���ύX�������܂���</p>
    <table border=1><tr><th>���i��</th><th>���i����</th><th>���i�摜</th><th>���i���i</th></tr>
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
      

      $sqlstr = "SELECT * " .
                            "FROM goods " .
                            "WHERE g_s_code = " . $_SESSION['s_code'] . 
                            " AND g_code = " . $_SESSION['g_code'];

      $result = mysql_query($sqlstr);
      $data = mysql_fetch_array($result);
      echo '</td><td>' . $data['g_name'] . 
           '</td><td>' . $data['g_exp'] . 
           '</td><td><img src="' . $data['g_phot'] . '">' .
           '</td><td>' . $data['g_pri'] .  
           '</td></tr>';
      

      $con = mysql_close($con);
      if(!$con){
        exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
      }
    ?>
    <table>
  </body>
</html> 