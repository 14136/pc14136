<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>���i���o�^</title>
  </head>
  <body>
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
      print($sqlstr);

      $result = mysql_query($sqlstr);
      $data = mysql_fetch_array($result);
      echo '</td><td>' . $data['g_name'] . 
           '</td><td>' . $data['g_exp'] . 
           '</td><td><img src="./gazou/' . $_SESSION['g_code'] . '">' .
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


<!--
SELECT *
FROM goods INNER JOIN s_member ON g_s_code = s_code
INNER JOIN history ON g_code = h_g_code
LEFT JOIN member ON m_code = h_m_code
LEFT JOIN discount ON d_g_code = g_code AND h_date BETWEEN d_open AND d_end
WHERE s_code = 1;
-->