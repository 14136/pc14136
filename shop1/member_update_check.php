<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>会員情報更新確認</title>
<body>
<h1>会員情報更新確認</h1><br><br>
<?php
        $m_pass1 = htmlspecialchars($_POST['m_pass1']);
        $m_pass2 = htmlspecialchars($_POST['m_pass2']);
	$m_name = htmlspecialchars($_POST['m_name']);
	$f_pos = htmlspecialchars($_POST['f_pos']);
	$b_pos = htmlspecialchars($_POST['b_pos']);
	$m_add = htmlspecialchars($_POST['m_add']);
	$m_tel = htmlspecialchars($_POST['m_tel']);
	$m_mail = htmlspecialchars($_POST['m_mail']);
	dataCheckNumber($m_pass1,"パスワード");
	dataCheckNumber($m_pass2,"パスワード(確認用)");
	dataCheckNumber($m_tel,"電話番号");
	dataCheckNumber2($f_pos,"郵便番号");
	dataCheckNumber3($b_pos,"郵便番号");
	dataCheckNull($m_name,"会員名");
	dataCheckNull($m_add,"住所");
	dataCheckNull($m_mail,"メールアドレス");
	dataCheckEqual($m_pass1,$m_pass2);
	function dataCheckNumber($str,$name){
    		if(strlen($str) == 0 || ereg("[^0-9]",$str)){
      		print("<html><head><title>入力エラー</title></head><body>");
      		print($name." は半角数字を入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}
	function dataCheckNumber2($str,$name){
    		if(strlen($str) != 3 || ereg("[^0-9]",$str)){
      		print("<html><head><title>入力エラー</title></head><body><h1>入力エラー</h1>");
      		print($name." は正しい数値を入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}
	function dataCheckNumber3($str,$name){
    		if(strlen($str) != 4 || ereg("[^0-9]",$str)){
      		print("<html><head><title>入力エラー</title></head><body><h1>入力エラー</h1>");
      		print($name." は正しい数値を入力してください。<br /><br />\n");
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
	function dataCheckEqual($str1,$str2){
    		if(!($str1 == $str2 )){
      		print("<html><head><title>パスワードエラー</title></head><body>");
      		print(" パスワードとパスワード(確認用)は同じ値をを入力してください。<br /><br />\n");
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
		echo $m_pass1;
		echo "<input type=\"hidden\" name=\"m_pass\" value=\""; 
		echo $m_pass1;
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
<tr>	<td width=180>郵便番号</td>
	<td>
	<?php
		$h_pos = $f_pos."-".$b_pos;
		echo $h_pos;
		echo "<input type=\"hidden\" name=\"bf_pos\" value=\""; 
		echo $f_pos.$b_pos;
		echo "\" />";
		echo "<input type=\"hidden\" name=\"h_pos\" value=\""; 
		echo $h_pos;
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