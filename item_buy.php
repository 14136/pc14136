<html>
<?xml version="1.0" encoding="Shift_JIS"?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang"ja" lang="ja">

<head></head>
<title>米販売システム_商品購入_注文者情報入力</title>
<body>
<center><h1><font color="#FF0000">注文者情報入力</font>　→　注文内容確認　→　完了<h1></center>

<!--買い物のかごの内容を表示、確認 -->
<table border="3" align="center">
<caption><h3>買い物かごには、以下の商品が入ってます。</h3></caption>
<tr align="center" valign="center"><td>商品名</td><td>単価（税込）</td><td>注文数</td><td>小計（税込）</td><td>ポイント数</td></tr>
<tr align="center" valign="center"><td>こめこめタイフーン</td><td>1,223円</td><td>10</td><td>12,230円</td><td>122pt</td></tr>
<!--
	for(int)
-->
<tr align="center" valign="center"><td>合計</td><td></td><td></td><td>12,230円</td><td>122pt</td></tr>
</table>
<br>
<center><font color="#FF0000">商品を削除する場合はカートで行ってください</font><br>
<h2><a href="/" >カートに戻る</a></h2></center>


<!--会員が行う処理 -->
<table border="3" align="center">
<caption><h3>1.注文者情報入力</h3></caption>
<form>
<tr><td colspan="3">会員の方</td></tr>
<tr align="center" valign="center" ><td colspan="3">下のフォームにユーザID、パスワードを入力して「次へ」ボタンを押してください。</td></tr> 
<tr><td>会員コード　　　</td><td><input type="text" name="m_code" size="38" maxlength="7" /></td><td rowspan="4" >会員情報を変更されたい方は<a href="/" >こちら</a></td></tr>
<tr><td>パスワード　　　</td><td><input type="text" name="m_pass" size="38" maxlength="4" /></td></tr>
<tr><td>宛先住所を変更する場合は<br>チェックしてください。</td><td align="center" valign="center"><input type="checkbox" /></td></tr> 
<tr><td>ポイントを使用する場合は<br>チェックしてください。</td><td align="center" valign="center"><input type="checkbox" /></td></tr> 
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