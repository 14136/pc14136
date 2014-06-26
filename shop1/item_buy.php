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
<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang"ja" lang="ja">

<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>米販売システム_商品購入_注文者情報入力</title>
<body>
<center><h1><font color="#FF0000">注文者情報入力</font>　→　注文内容確認　→　完了<h1></center>
<!--買い物のかごの内容を表示、確認 -->
<table border="3" align="center">
<caption><h3>買い物かごには、以下の商品が入ってます。</h3></caption>
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
<td><?php echo $row['g_pri']; ?>円</td> <!-- 単価 -->
<td><?php echo $num; ?></td>  <!-- 注文数 -->
<td><?php echo $row['g_pri'] * $num; $sum_pri += $row['g_pri'] * $num;?>円</td> <!-- 小計 -->
<td><?php echo $row['g_pri'] * $num * 0.1; $sum_poin += $row['g_pri'] * $num * 0.1;  ?>pt</td> <!-- ポイント -->
</tr>
<?php	
	}

?>
<tr align="center" valign="center"><td>合計</td><td></td><td></td><td><?php echo $sum_pri; ?>円</td><td><?php echo $sum_poin; ?>pt</td></tr>
</table>
<br>
<center><font color="#FF0000">商品を削除する場合はカートで行ってください</font><br>
<a href="cart.php" >カートに戻る</a></center>


<!--会員が行う処理 -->
<table border="3" align="center">
<caption><h3>1.注文者情報入力</h3></caption>
<form name="form1" action="m_item_buy_check.php" method="post">
<tr><td colspan="3">会員の方</td></tr>
<tr align="center" valign="center" ><td colspan="3">下のフォームにユーザID、パスワードを入力して「次へ」ボタンを押してください。</td></tr> 
<tr><td>会員コード　　　</td><td><input type="text" name="m_code" size="38" maxlength="7" /></td><td rowspan="4" >会員情報を変更されたい方は<a href="member_update.php" >こちら</a></td></tr>
<tr><td>パスワード　　　</td><td><input type="text" name="m_pass" size="38" maxlength="4" /></td></tr>
<tr><td>ポイントを使用する場合は<br>チェックしてください。</td><td align="center" valign="center"><input name="point" type="hidden" value="NULL回避用" /><input type="checkbox" name="point" value="1" /></td></tr> 
<tr><td align="center" colspan="2">宛先住所を変更する場合は<a href="m_item_buy_henkou.php" >こちら</a></td></tr> 
<tr align="center" valign="center"><td colspan="3" ><input type="submit" value="次へ" /></td></tr>
</form>

</table>
<br>
<br>
<br>
<!--非会員が行う処理 -->
<table border="3" align="center">
<form action="item_buy_check.php" method="post">
<tr><td colspan="3">会員登録をされていない方</td></tr>
<tr align="center" valign="center" ><td colspan="3">下のフォームに必要事項を入力し、「次へ」ボタンを押してください。<br>
米販売システムでは、会員登録をされていなくてもお買い物ができます。<br> ※お買い物時のポイントがつきませんのでご注意ください。<br>
 必須の項目は必ず入力してください。</td></tr> 

<tr><td>お名前（任意）　　　</td><td><input type="text" name="name" size="52" /></td><td rowspan="4" >会員登録をされたい方は<a href="/" >こちら</a></td></tr>
<tr><td>宛先住所(必須)　　　</td><td><input type="text" name="h_add" size="52" maxlength="50" /></td></tr>
<tr><td>電話番号（必須）　　　</td><td><input type="text" name="h_tel" size="52" maxlength="20" /></td></tr>
<tr><td>メールアドレス（必須）　　　</td><td><input type="text" name="h_mail" size="52" maxlength="50" /></td></tr>

<tr align="center" valign="center"><td colspan="3" ><input type="submit" value="次へ" /></td></tr>
</form>
</table>

</body>
</html>