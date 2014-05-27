<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shiftJIS" /></head>
<title>米販売システム_商品購入_宛先変更</title>
<body>
<center><h1>注文者情報入力　→　注文内容確認　→　<font color="#FF0000">完了</font></h1></center>

<br><center>
<h3>
お買い上げありがとうございました。お買い上げ頂いた商品は以下の通りです。
</h3>
</center>

<!--買い物のかごの内容を表示、確認 -->
<table border="3" align="center">
<caption><h3>購入商品一覧</h3></caption>
<tr align="center" valign="center"><td>商品名</td><td>単価（税込）</td><td>注文数</td><td>小計（税込）</td><td>ポイント数</td></tr>
<tr align="center" valign="center"><td>こめこめタイフーン</td><td>1,223円</td><td>10</td><td>12,230円</td><td>122pt</td></tr>
<!--
	for(int)
-->
<tr align="center" valign="center"><td>ポイント値引き</td><td></td><td></td><td>-9999円</td><td>-9999pt</td></tr>
<tr align="center" valign="center"><td>合計</td><td></td><td></td><td>12,230円</td><td>122pt</td></tr>
</table>
<br><center>
<h3>
今回、付与されたポイント数　122pt,使用したポイント数　-9999pt<br>
お客様の合計ポイント数　122pt<br>
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
		$h_tel = htmlspecialchars($_POST['name']);
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
</body>
</html>