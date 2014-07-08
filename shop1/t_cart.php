<!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>カート | お米販売サイト</title>
 <link rel="stylesheet" href="shop.css">
 </head>
 <body>
 <h1>カート</h1>
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
 <table>
   <tr><th>商品名</th><th>単価</th><th>数量</th><th>小計</th></tr>
   <?php foreach($rows as $r) { ?>
     <tr>
       <td><?php echo $r['g_name']; ?></td>
       <td><?php echo number_format($r['g_pri']); ?></td>
       <td><?php echo $r['num']; ?></td>
       <td><?php echo number_format($r['g_pri'] * $r['num']);?> 円</td>
       </td>
   <?php } ?>
   <tr><td colspan='2'> </td><td><strong>合計</strong></td><td><?php  echo number_format($sum);
		 
		  ?> 円</td></tr>
 </table>
 <div class="base"><center>
   <a href="index.php">お買い物に戻る</a>　
  <a href="cart_empty.php">カートを空にする</a>　
  <a href="item_buy.php">購入する</a>
  </center>
 </div>
 </body>
 </html>