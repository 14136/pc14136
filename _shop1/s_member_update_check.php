<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>販売会員情報更新確認</title>
<body>
<h1>販売会員情報更新確認</h1><br><br>
<?php
        $s_pass = htmlspecialchars($_POST['s_pass']);
	$s_comp = htmlspecialchars($_POST['s_comp']);
	$s_name = htmlspecialchars($_POST['s_name']);
	$s_add = htmlspecialchars($_POST['s_add']);
	$s_tel = htmlspecialchars($_POST['s_tel']);
	$s_mail = htmlspecialchars($_POST['s_mail']);

	dataCheckNumber($s_pass,"パスワード");
	dataCheckNumber($s_tel,"電話番号");
	dataCheckNull($s_comp,"販売企業名");
	dataCheckNull($s_name,"代表者名");
	dataCheckNull($s_add,"住所");
	dataCheckNull($s_mail,"メールアドレス");

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
<caption><h3>販売会員情報　<font color="#FF0000">入力内容に間違いがないか再度確認してください。</font></h3></caption>
<form  action="s_member_update_finish.php" method="post"><br><br>
<tr><td width = 300 >パスワード</td>
	<td>
	<?php
		echo $s_pass;
		echo "<input type=\"hidden\" name=\"s_pass\" value=\""; 
		echo $s_pass;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >販売企業名</td>
	<td>
	<?php
		echo $s_comp;
		echo "<input type=\"hidden\" name=\"s_comp\" value=\""; 
		echo $s_comp;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >代表者名</td>
	<td>
	<?php
		echo $s_name;
		echo "<input type=\"hidden\" name=\"s_name\" value=\""; 
		echo $s_name;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >住所</td>
	<td>
	<?php
		echo $s_add;
		echo "<input type=\"hidden\" name=\"s_add\" value=\""; 
		echo $s_add;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >電話番号</td>
	<td>
	<?php
		echo $s_tel;
		echo "<input type=\"hidden\" name=\"s_tel\" value=\""; 
		echo $s_tel;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >メールアドレス</td>
	<td>
	<?php
		echo $s_mail;
		echo "<input type=\"hidden\" name=\"s_mail\" value=\""; 
		echo $s_mail;
		echo "\" />";
	?>
	</td>
</tr>
</table>
<br>
<center><input type="submit" value="更新" /></center>
</form>
<br><br>
<center>訂正がある場合は<a href="s_member_update.php" >こちら</a></center>
</html>