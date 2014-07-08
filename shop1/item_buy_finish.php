<?php
	require 'common.php';
	if(!isset($_SESSION['cart'])){
	      		print("<html><head><title>エラー</title></head><body><center><h1><font color=\"#FF0000\">エラー</font></h1>");
      		print("<font size=\"16\">カートに何も入っていません。<br /><br />\n");
      		print("<a href=\"cart.php\">カートに戻る</a>\n");
      		print("</font></center></body></html>");
      		exit;
	}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>米販売システム_商品購入_宛先変更</title>
<body>
<center><h1>注文者情報入力　→　注文内容確認　→　<font color="#FF0000">完了</font></h1></center>
<Table border="1"align="center" width=% height="30" cellspacing="0" cellpadding="0">
<Tr><Td align="center">
<a href="mainmenu.php">HOME
</Td><Td align="center">
<a href="m_login.php">会員ログイン
</Td><Td align="center">
<a href="s_login.php">販売会員ログイン
</Td><Td align="center">
<a href="m_entry.html">会員登録
</Td><Td align="center">
<a href="s_entry.html">販売会員登録
</Td></Tr>
</Table>
<br>
<br>
<br><center>
<h3>
お買い上げありがとうございました。お買い上げ頂いた商品は以下の通りです。
</h3>
</center>

<!--買い物のかごの内容を表示、確認 -->
<table border="3" align="center">
<caption><h3>購入商品一覧</h3></caption>
<tr align="center" valign="center"><td>商品名</td><td>単価（税込）</td><td>注文数</td><td>小計（税込）</td></tr>
<?php
        $pdo = connect();
	$sum_pri =0;
	$sum_poin = 0;
 	$n_date = date("Y/m/d");
	foreach($_SESSION['cart'] as $code => $num) {
         $st = $pdo->prepare("SELECT MIN(if(d_open <= ? and d_end >= ?,g_pri - d_pri,g_pri)) as g_pri,g_code,g_name,g_exp,g_phot FROM discount right join goods on discount.d_g_code = goods.g_code GROUP BY g_code having g_code = ?");
         $st->execute(array($n_date,$n_date,$code));
         $row = $st->fetch();
 ?>

<tr align="center" valign="center">
<td><?php echo $row['g_name']; ?></td> <!-- 商品名 -->
<td><?php echo number_format($row['g_pri']); ?>円</td> <!-- 単価 -->
<td><?php echo $num; ?></td>  <!-- 注文数 -->
<td><?php echo number_format($row['g_pri'] * $num); $sum_pri += $row['g_pri'] * $num;?>円</td> <!-- 小計 -->
</tr>
<?php	
	} 
?>
<tr align="center" valign="center"><td>合計</td><td colspan="2"></td><td><?php echo number_format($sum_pri); ?>円</td>
</table>
<br><center>
<h3>
またのご利用お待ちしております。
</h3>
</center>
<table border="3" align="center" width=800 >
<caption><h3>1.注文者情報</h3></caption>

<tr>	<td width=180>お名前</td>
	<td>
	<?php
		$name = htmlspecialchars($_POST['name']);
		echo $name;
	?>	
	</td>
</tr>
<tr>	<td width=180>郵便番号</td>
	<td>
	<?php
		$h_pos = htmlspecialchars($_POST['bf_pos']);
		$h_pos2 = htmlspecialchars($_POST['h_pos']);
		echo $h_pos2;
	?>	
	</td>
</tr>

<tr>	<td width=180>宛先住所</td>
	<td>
	<?php
		$h_add = htmlspecialchars($_POST['h_add']);
		echo $h_add;
	?>
	</td>
</tr>
<tr>	<td width=180>電話番号</td>
	<td>
	<?php
		$h_tel = htmlspecialchars($_POST['h_tel']);
		echo $h_tel;
	?>
	</td>
</tr>
<tr>	<td width=180>メールアドレス</td>
	<td>
	<?php
		$h_mail = htmlspecialchars($_POST['h_mail']);
		echo $h_mail;
	?>
	</td>
</tr>
</table>
<?php
	$h_m_code = "9999999";
	$h_date = date("Y/m/d");;
	$h_pri = "0";
	foreach($_SESSION['cart'] as $code => $num) {
         $st = $pdo->prepare("INSERT INTO history(`h_m_code`, `h_g_code`, `h_date`, `h_phot`, `h_pri`, `h_name`, `h_add`, `h_tel`, `h_mail`,`h_post`) VALUES(?,?,?,?,?,?,?,?,?,?)");
         $st->execute(array($h_m_code,$code,$h_date,$num,$h_pri,$name,$h_add,$h_tel,$h_mail,$h_pos));	
	}
   $_SESSION['cart'] = null;	
 
?>
</body>
</html>