<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>会員情報更新確認</title>
<body>
<h1>会員情報更新確認</h1><br><br>
<?php
        $m_pass = htmlspecialchars($_POST['m_pass']);
	$m_name = htmlspecialchars($_POST['m_name']);
	$m_add = htmlspecialchars($_POST['m_add']);
	$m_tel = htmlspecialchars($_POST['m_tel']);
	$m_mail = htmlspecialchars($_POST['m_mail']);
	dataCheckNumber($m_pass,"パスワード");
	dataCheckNumber($m_tel,"電話番号");
	dataCheckNull($m_name,"会員名");
	dataCheckNull($m_add,"住所");
	dataCheckNull($m_mail,"メールアドレス");
	function dataCheckNumber($str,$name){
    		if(strlen($str) == 0 || ereg("[^0-9]",$str)){
      		print("<html><head><title>入力エラー</title></head><body>");
      		print($name." は半角数字を入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}
	function dataCheckNull($str,$name){
    		if(strlen($str) == 0 ){
      		print("<html><head><title>入力エラー</title></head><body>");
      		print($name." に値をを入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}


?>
<table  border="3" align="center" width=800>
<caption><h3>1.会員情報　<font color="#FF0000">入力内容に間違いがないか再度確認してください。</font></h3></caption>
<form  action="member_update_finish.php" method="post"><br><br>
<tr><td width = 300 >パスワード</td>
	<td>
	<?php
		echo $m_pass;
		echo "<input type=\"hidden\" name=\"m_pass\" value=\""; 
		echo $m_pass;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >会員名</td>
	<td>
	<?php
		echo $m_name;
		echo "<input type=\"hidden\" name=\"m_name\" value=\""; 
		echo $m_name;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >住所</td>
	<td>
	<?php
		echo $m_add;
		echo "<input type=\"hidden\" name=\"m_add\" value=\""; 
		echo $m_add;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >電話番号</td>
	<td>
	<?php
		echo $m_tel;
		echo "<input type=\"hidden\" name=\"m_tel\" value=\""; 
		echo $m_tel;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >メールアドレス</td>
	<td>
	<?php
		echo $m_mail;
		echo "<input type=\"hidden\" name=\"m_mail\" value=\""; 
		echo $m_mail;
		echo "\" />";
	?>
	</td>
</tr>
</table>
<br>
<center><input type="submit" value="更新" /></center>
</form>
<br><br>
<center>訂正がある場合は<a href="member_update.php" >こちら</a></center>
</html>