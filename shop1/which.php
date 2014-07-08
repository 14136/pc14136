<?php
   require 'common.php';
   $pdo = connect();
   $g_code = htmlspecialchars($_POST['g_code']);
   $g_code = "%".$g_code ."%";
   $n_date = date("Y/m/d");
   $st = $pdo->prepare("SELECT MIN(if(d_open <= ? and d_end >= ?,g_pri - d_pri,g_pri)) as g_pri,g_code,g_name,g_exp,g_phot FROM discount right join goods on discount.d_g_code = goods.g_code GROUP BY g_code having g_name like ? or g_exp like ?;");
   $st->execute(array($n_date,$n_date,$g_code,$g_code));
 ?><!--  where g_name like \"%?%\" or g_exp like \"%?%\" -->
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
<h1 align="center">商品検索画面<h1>

<!--買い物のかごの内容を表示、確認 -->
<table border="1" align="center">
<form action="which.php" method="post">
<tr align="center" valign="center" ><td colspan="3">下のフォームに検索キーワードを入力して「検索」ボタンを押してください。</td></tr> 
<tr><td>検索キーワード　　　</td><td><input type="text" name="g_code" size="50" maxlength="20" /></td>
<tr align="center" valign="center"><td colspan="3" ><input type="submit" value="検索" /></td></tr>
</form>
</table>
 <table>
   <?php while($goods = $st->fetch()) { ?>
     <tr>
       <td>
         <?php echo img_tag($goods['g_phot']) ?>
       </td>
       <td>
         <p class="goods"><?php echo $goods['g_name'] ?></p>
         <p><?php echo nl2br($goods['g_exp']) ?></p>
       </td>
       <td width="80">
         <p><?php echo number_format($goods['g_pri']);?> 円</p>
         <form action="cart_in.php" method="post">
           <select name="num">
             <?php
               for ($i = 1; $i <= 9; $i++) {
                 echo "<option>$i</option>";
               }
             ?>
           </select>
           <input type="hidden" name="code" value="<?php echo $goods['g_code'] ?>">
           <input type="submit" name="submit" value="カートに入れる">
         </form><a href="cart.php">カートを見る</a>
       </td>
     </tr>
   <?php } ?>
 </table>
 </body>
 </html>