<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shiftJIS" /></head>
<title>�Ĕ̔��V�X�e��_���i�w��_�������e�m�F</title>
<body>
<center><h1>�����ҏ����́@���@<font color="#FF0000">�������e�m�F</font>�@���@����</h1></center>

<!--�������̂����̓��e��\���A�m�F -->
<table border="3" align="center">
<caption><h3>���i�w���ꗗ�@<font color="#FF0000">������x���m���߂�������</font></h3></caption>
<tr align="center" valign="center"><td>���i��</td><td>�P���i�ō��j</td><td>������</td><td>���v�i�ō��j</td><td>�|�C���g��</td></tr>
<tr align="center" valign="center"><td>���߂��߃^�C�t�[��</td><td>1,223�~</td><td>10</td><td>12,230�~</td><td>122pt</td></tr>
<!--
	for(int)
-->
<tr align="center" valign="center"><td>�|�C���g�l����</td><td></td><td></td><td>-9999�~</td><td>-9999pt</td></tr>
<tr align="center" valign="center"><td>���v</td><td></td><td></td><td>2,231�~</td><td>122pt</td></tr>
</table>
<br>
<center><font color="#FF0000">���i���폜����ꍇ�̓J�[�g�ōs���Ă�������</font><br>
<h2><a href="/" >�J�[�g�ɖ߂�</a></h2></center>

<table border="3" align="center" width=800 >
<caption><h3>1.�����ҏ��@<font color="#FF0000">���͓��e�ɊԈႢ���Ȃ����ēx�m�F���Ă��������B</font></h3></caption>
<form action="item_buy_finish.php" method="post" >
<tr>	<td width=180>�����O</td>
	<td>
	<?php
		$name = htmlspecialchars($_POST['name']);
		echo $name;
		echo "<input type=\"hidden\" name=\"name\" value=\""; 
		echo $name;
		echo "\" />";
	?>
	</td>
</tr>
<tr>	<td width=180>����Z��</td>
	<td>
	<?php 
		$h_add = htmlspecialchars($_POST['h_add']);
		echo $h_add;
		echo "<input type=\"hidden\" name=\"h_add\" value=\""; 
		echo $h_add;
		echo "\" />";
	?>		
	</td>
</tr>
<tr>	<td width=180>�d�b�ԍ�</td>
	<td>
	<?php
		$h_tel = htmlspecialchars($_POST['h_tel']);
		echo $h_tel;
		echo "<input type=\"hidden\" name=\"h_tel\" value=\""; 
		echo $h_tel;
		echo "\" />";
	?>
	</td>
</tr>
<tr>	<td width=180>���[���A�h���X</td>
	<td>
	<?php
		$h_mail = htmlspecialchars($_POST['h_mail']);
		echo $h_mail;
		echo "<input type=\"hidden\" name=\"h_mail\" value=\""; 
		echo $h_mail;
		echo "\" />";
	?>		
	</td>
</tr>
<tr align="center" valign="center"><td colspan="2">����������ꍇ��<a href="/item_buy.php" >������</a></td></tr>
<tr align="center" valign="center"><td colspan="2" ><input type="submit" value="�w��" /></td></tr>
</form>
</table>

</body>
</html>