<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shiftJIS" /></head>
<title>米販売システム_新規会員登録_新規会員登録確認</title>
<body>
<center><h1><font color="#FF0000">新規会員登録確認</font></h1></center>
<table border="3" align="center" width=800 >
<center><h3><font color="#FF0000">入力内容に間違いがないか確認してください。</font></h3></center>
<form action="m_entry_finish.php" method="post" >


<tr>	<td width=180>お名前</td>
	<td>
	<?php
		$m_name = htmlspecialchars($_POST['m_name']);
		echo $m_name;
		echo "<input type=\"hidden\" name=\"m_name\" value=\""; 
		echo $m_name;
		echo "\" />";
	?>
	</td>
</tr>

<tr>	<td width=180>お名前(フリガナ)</td>
	<td>
	<?php
		$m_fname = htmlspecialchars($_POST['m_fname']);
		echo $m_fname;
		echo "<input type=\"hidden\" name=\"m_fname\" value=\""; 
		echo $m_fname;
		echo "\" />";
	?>
	</td>
</tr>

<tr>	<td width=180>宛先住所</td>
	<td>
	<?php 
		$m_add = htmlspecialchars($_POST['m_add']);
		echo $m_add;
		echo "<input type=\"hidden\" name=\"m_add\" value=\""; 
		echo $m_add;
		echo "\" />";
	?>		
	</td>
</tr>

<tr>	<td width=180>電話番号</td>
	<td>
	<?php
		$m_tel = htmlspecialchars($_POST['m_tel']);
		echo $m_tel;
		echo "<input type=\"hidden\" name=\"m_tel\" value=\""; 
		echo $m_tel;
		echo "\" />";
	?>
	</td>
</tr>

<tr>	<td width=180>メールアドレス</td>
	<td>
	<?php
		$m_mail = htmlspecialchars($_POST['m_mail']);
		echo $m_mail;
		echo "<input type=\"hidden\" name=\"m_mail\" value=\""; 
		echo $m_mail;
		echo "\" />";
	?>		
	
</tr>

<tr>	<td width=180>会員コード</td>
	<td>
	<?php
		$m_code = htmlspecialchars($_POST['m_code']);
		echo $m_code;
		echo "<input type=\"hidden\" name=\"m_code\" value=\""; 
		echo $m_code;
		echo "\" />";
	?>
	</td>
</tr>

<tr>	<td width=180>パスワード</td>
	<td>
	<?php
		$m_pass = htmlspecialchars($_POST['m_pass']);
		echo $m_pass;
		echo "<input type=\"hidden\" name=\"m_pass\" value=\""; 
		echo $m_pass;
		echo "\" />";
	?>
	</td>
</tr>

<tr align="center" valign="center"><td colspan="2"> <input type="submit" value="訂正"><a href="/m_entry.php" ></a></td></tr>
<tr align="center" valign="center"><td colspan="2" ><input type="submit" value="確定" /></td></tr>
</form>
</table>

</body>
</html>

