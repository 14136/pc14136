<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shiftJIS" /></head>
<title>米販売システム_新規会員登録_新規販売会員登録確認</title>
<body>
<center><h1><font color="#FF0000">新規販売会員登録確認</font></h1></center>
<table border="3" align="center" width=800 >
<center><h3><font color="#FF0000">入力内容に間違いがないか確認してください。</font></h3></center>
<form action="s_entry_finish.php" method="post" >


<tr>	<td width=180>代表者名</td>
	<td>
	<?php
		$s_name = htmlspecialchars($_POST['s_name']);
		echo $s_name;
		echo "<input type=\"hidden\" name=\"s_name\" value=\""; 
		echo $s_name;
		echo "\" />";
	?>
	</td>
</tr>


<tr>	<td width=180>販売企業名</td>
	<td>
	<?php
		$s_comp = htmlspecialchars($_POST['s_comp']);
		echo $s_comp;
		echo "<input type=\"hidden\" name=\"s_comp\" value=\""; 
		echo $s_comp;
		echo "\" />";
	?>
	</td>
</tr>

<tr>	<td width=180>宛先住所</td>
	<td>
	<?php 
		$s_add = htmlspecialchars($_POST['s_add']);
		echo $s_add;
		echo "<input type=\"hidden\" name=\"s_add\" value=\""; 
		echo $s_add;
		echo "\" />";
	?>		
	</td>
</tr>
<tr>	<td width=180>電話番号</td>
	<td>
	<?php
		$s_tel = htmlspecialchars($_POST['s_tel']);
		echo $s_tel;
		echo "<input type=\"hidden\" name=\"s_tel\" value=\""; 
		echo $s_tel;
		echo "\" />";
	?>
	</td>
</tr>
<tr>	<td width=180>メールアドレス</td>
	<td>
	<?php
		$s_mail = htmlspecialchars($_POST['s_mail']);
		echo $s_mail;
		echo "<input type=\"hidden\" name=\"s_mail\" value=\""; 
		echo $s_mail;
		echo "\" />";
	?>		
	</td>
</tr>



<tr>	<td width=180>パスワード</td>
	<td>
	<?php
		$s_pass = htmlspecialchars($_POST['s_pass']);
		echo $s_pass;
		echo "<input type=\"hidden\" name=\"s_pass\" value=\""; 
		echo $s_pass;
		echo "\" />";
	?>
	</td>
</tr>
</table>

<br>
<center><input type="submit" value="確定">
&nbsp;<input type="submit" value="訂正"><a href="/s_entry.php" ></center>

</form>

</body>
</html>

