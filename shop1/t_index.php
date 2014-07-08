<!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>お米販売サイト</title>
 <link rel="stylesheet" href="shop.css">
 </head>
 <body>
 <h1>お米販売サイト</h1>
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
<?php
	if($in == 1){
		echo "<center><h2>カートに入れました。</h2></center>";
	} 
?>
<h1 align="center">商品検索画面<h1>
<!--買い物のかごの内容を表示、確認 -->
<table border="1" align="center">
<form action="which.php" method="post">
<tr align="center" valign="center" ><td colspan="3">下のフォームに検索キーワードを入力して「検索」ボタンを押してください。</td></tr> 
<tr><td>検索キーワード　　　</td><td><input type="text" name="g_code" size="60" maxlength="20" /></td>
<tr align="center" valign="center"><td colspan="3" ><input type="submit" value="検索" /></td></tr>
</form>
</table>
 <table>
   <?php foreach ($goods as $g) { ?>
     <tr>
       <td>
         <?php echo img_tag($g['g_phot']); ?>
       </td>
       <td>
         <p class="goods"><?php echo $g['g_name']; ?></p>
         <p><?php echo nl2br($g['g_exp']); ?></p>
       </td>
       <td width="80">
         <p><?php
		 echo  number_format($g['g_pri']);
	     ?> 円</p>
         <form action="cart_in.php" method="post">
           <select name="num">
             <?php
               for ($i = 1; $i <= 9; $i++) {
                 echo "<option>$i</option>";
               }
             ?>
           </select>
           <input type="hidden" name="code" value="<?php echo $g['g_code'] ?>">
           <input type="submit" name="submit" value="カートに入れる">
         </form><a href="cart.php">カートを見る</a>
       </td>
     </tr>
   <?php } ?>
 </table>
 </body>
 </html>