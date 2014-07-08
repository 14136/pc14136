



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


<tr>	<td width=180>郵便番号</td>
	<td>
	<?php
		$m_pass = htmlspecialchars($_POST['m_post1']);
		echo $m_post;
		echo "<input type=\"hidden\" name=\"m_post\" value=\""; 
		echo $m_post;
		echo "\" />";
	?>
	
</tr>



<tr>	<td width=180>都道府県</td>
	<td>
	<?php
		$m_add1 = htmlspecialchars($_POST['m_add1']);
		echo $m_add1;
		echo "<input type=\"hidden\" name=\"m_add1\" value=\""; 
		echo $m_add1;
		echo "\" />";
	?>
	
</tr>



<tr>	<td width=180>市町村</td>
	<td>
	<?php
		$m_add2 = htmlspecialchars($_POST['m_add2']);
		echo $m_add2;
		echo "<input type=\"hidden\" name=\"m_add2\" value=\""; 
		echo $m_add2;
		echo "\" />";
	?>
	
</tr>


<tr>	<td width=180>建物名</td>
	<td>
	<?php
		$m_add3 = htmlspecialchars($_POST['m_add3']);
		echo $m_add3;
		echo "<input type=\"hidden\" name=\"m_add3\" value=\""; 
		echo $m_add3;
		echo "\" />";
	?>
	
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
	
</tr>


</table>
<br>


<center><input type="submit" value="確定">
&nbsp;<input type="submit" value="訂正"><a href="/m_entry.html" ></center>
</form>
</body>

