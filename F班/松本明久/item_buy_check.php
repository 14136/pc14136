<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shiftJIS" /></head>
<title>米販売システム_商品購入_注文内容確認</title>
<body>
<center><h1>注文者情報入力　→　<font color="#FF0000">注文内容確認</font>　→　完了</h1></center>

<!--買い物のかごの内容を表示、確認 -->
<table border="3" align="center">
<caption><h3>商品購入一覧　<font color="#FF0000">もう一度お確かめください</font></h3></caption>
<tr align="center" valign="center"><td>商品名</td><td>単価（税込）</td><td>注文数</td><td>小計（税込）</td><td>ポイント数</td></tr>
<tr align="center" valign="center"><td>こめこめタイフーン</td><td>1,223円</td><td>10</td><td>12,230円</td><td>122pt</td></tr>
<!--
	for(int)
-->
<tr align="center" valign="center"><td>ポイント値引き</td><td></td><td></td><td>-9999円</td><td>-9999pt</td></tr>
<tr align="center" valign="center"><td>合計</td><td></td><td></td><td>2,231円</td><td>122pt</td></tr>
</table>
<br>
<center><font color="#FF0000">商品を削除する場合はカートで行ってください</font><br>
<h2><a href="/" >カートに戻る</a></h2></center>

<table border="3" align="center" width=800 >
<caption><h3>1.注文者情報　<font color="#FF0000">入力内容に間違いがないか再度確認してください。</font></h3></caption>
<form action="item_buy_finish.php" method="post" >
<tr>	<td width=180>お名前</td>
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
<tr>	<td width=180>宛先住所</td>
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
<tr>	<td width=180>電話番号</td>
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
<tr>	<td width=180>メールアドレス</td>
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
<tr align="center" valign="center"><td colspan="2">訂正がある場合は<a href="/item_buy.php" >こちら</a></td></tr>
<tr align="center" valign="center"><td colspan="2" ><input type="submit" value="購入" /></td></tr>
</form>
</table>

</body>
</html>