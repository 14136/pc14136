<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>���O�C��</title>
  </head>
  <body>
    <?php
      $m_code = $_POST['m_code'];
      $m_pass = $_POST['m_pass']
      print ("���̃f�[�^���󂯎��܂���<br />");
      print ("���O�F$m_code<br />");
      $con = mysql_connect('172.20.17.202','admin','1111');
      if (!$con) {
        exit('�f�[�^�x�[�X�ɐڑ��ł��܂���ł����B');
      }

      $result = mysql_select_db('riceshop', $con);
      if (!$result) {
        exit('�f�[�^�x�[�X��I���ł��܂���ł����B');
      }

      $result = mysql_query('SET NAMES utf8', $con);
      if (!$result) {
        exit('�����R�[�h���w��ł��܂���ł����B');
      }

      $result = mysql_query('SELECT count FROM member WHERE m_code = ' . $m_code . ' and m_pass = ' . $m_pass , $con);
      while ($data = mysql_fetch_array($result)) {
        echo '<p>' . $data['m_code'] . '������R�[�h�@' . $data['m_pass'] . '���p�X���[�h�@' . $data['m_name'] . '�����O�@' . $data['m_add'] . '���Z���@' . $data['m_tel'] . '���d�b�ԍ��@' . $data['m_mail'] .'�����[���A�h���X�@'."</p>\n";
      }

      $con = mysql_close($con);
      if (!$con) {
        exit('�f�[�^�x�[�X�Ƃ̐ڑ�������܂���ł����B');
      }

    ?>
    ���̓t�H�[���ł��B
    ���O����͂��Ă݂܂��傤�B
    <form action="output.php" method="post">
      <table border="1">
        <tr>
          <td>���O</td>
          <td><input type="text" name="name"></td>
          <td colspan="2" align="center"><input type="submit" value="����"></td>
        </tr>
      </table>
    </form>
  </body>
</html>