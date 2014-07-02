<!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>お米販売サイト</title>
 <link rel="stylesheet" href="shop.css">
 </head>
 <body>
 <h1>お米販売サイト</h1>

<h1 align="center">商品検索画面<h1>

<!--買い物のかごの内容を表示、確認 -->
<table border="1" align="center">
<form action="which.php" method="post">
<tr align="center" valign="center" ><td colspan="3">下のフォームに検索キーワードを入力して「検索」ボタンを押してください。</td></tr> 
<tr><td>検索キーワード　　　</td><td><input type="text" name="g_code" size="35" maxlength="7" /></td>
<tr align="center" valign="center"><td colspan="3" ><input type="submit" value="検索" /></td></tr>
</form>
</table>
 <table>
   <?php foreach ($goods as $g) { ?>
     <tr>
       <td>
         <?php echo img_tag($g['g_code']); ?>
       </td>
       <td>
         <p class="goods"><?php echo $g['g_name']; ?></p>
         <p><?php echo nl2br($g['g_exp']); ?></p>
       </td>
       <td width="80">
         <p><?php
		echo $g['g_pri'];
	     ?> 円</p>
         <form action="cart.php" method="post">
           <select name="num">
             <?php
               for ($i = 1; $i <= 9; $i++) {
                 echo "<option>$i</option>";
               }
             ?>
           </select>
           <input type="hidden" name="code" value="<?php echo $g['g_code'] ?>">
           <input type="submit" name="submit" value="カートへ">
         </form>
       </td>
     </tr>
   <?php } ?>
 </table>
 </body>
 </html>