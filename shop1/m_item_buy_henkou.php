<?php
	require 'common.php';
	if(!isset($_SESSION['cart'])){
	      		print("<html><head><title>エラー</title></head><body><h1>エラー</h1>");
      		print("カートに何も入っていません。<br /><br />\n");
      		print("<a href=\"cart.php\">カート</a>\n");
      		print("</body></html>");
      		exit;
	}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>米販売システム_商品購入_宛先変更</title>
<body>
<center><h1><font color="#FF0000">注文者情報入力</font>　→　注文内容確認　→　完了</h1></center>

<!--買い物のかごの内容を表示、確認 -->
<table border="3" align="center">
<caption><h3>商品購入一覧</h3></caption>
<tr align="center" valign="center"><td>商品名</td><td>単価（税込）</td><td>注文数</td><td>小計（税込）</td><td>ポイント数</td></tr>
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
<td><?php echo number_format($row['g_pri'] * $num * 0.1); $sum_poin += $row['g_pri'] * $num * 0.1;  ?>pt</td> <!-- ポイント -->
</tr>
<?php	
	} 
?>
<tr align="center" valign="center"><td>合計</td><td colspan="2"></td><td><?php if($sum_pri < 0){	$sum_pri = 0;	} echo number_format($sum_pri); ?>円</td><td><?php echo number_format($sum_poin); ?>pt</td></tr>
</table>
</table>
<br>
<center><font color="#FF0000">商品を削除する場合はカートで行ってください</font><br>
<h2><a href="cart.php" >カートに戻る</a></h2></center>


<!-- テーブル表示 -->
<table border="3" align="center">
<caption><h3>1.宛先変更　</h3></caption>
<form action="m_item_buy_henkou_check.php" method="post" >
<tr><td width="300">会員コード　　　</td><td><input type="text" name="m_code" size="50" maxlength="7" /></td><td rowspan="4" >会員情報を変更されたい方は<a href="member_update.php" >こちら</a></td></tr>
<tr><td width="300">パスワード　　　</td><td><input type="password" name="m_pass" size="51" maxlength="4" /></td></tr>
<tr><td width="300">ポイントを使用する場合は<br>チェックしてください。</td><td align="center" valign="center"><input name="point" type="hidden" value="NULL回避用" /><input type="checkbox" name="point" value="1" /></td></tr> 
<tr><td>宛先郵便番号（必須）　　　</td><td><input type="text" name="f_pos" size="20" maxlength="3" />-<input type="text" name="b_pos" size="23" maxlength="4" /></td></tr>
<tr><td width="300">宛先住所　　　</td><td><input type="text" name="h_add" size="50" maxlength="50" /></td></tr>
<tr align="center" valign="center"><td colspan="3">訂正がある場合は<a href="item_buy.php" >こちら</a></td></tr>
<tr align="center" valign="center"><td colspan="3" ><input type="submit" value="次へ" /></td></tr>
</form>
</table>

</body>
</html>