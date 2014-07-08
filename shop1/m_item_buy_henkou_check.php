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
<?php
	$m_code = htmlspecialchars($_POST['m_code']);
	$m_pass = htmlspecialchars($_POST['m_pass']);
	$f_pos = htmlspecialchars($_POST['f_pos']);
	$b_pos = htmlspecialchars($_POST['b_pos']);
	$h_add = htmlspecialchars($_POST['h_add']);
	$_SESSION['m_code_buy'] = $m_code;
	dataCheckNumber($m_code,"会員コード");
	dataCheckNumber($m_pass,"パスワード");
	dataCheckNull($h_add,"宛先住所");
	dataCheckNumber2($f_pos,"郵便番号");
	dataCheckNumber3($b_pos,"郵便番号");
	function dataCheckNumber($str,$name){
    		if(strlen($str) == 0 || ereg("[^0-9]",$str)){
      		print("<html><head><title>入力エラー</title></head><body><h1>入力エラー</h1>");
      		print($name." は半角数字を入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}
	function dataCheckNumber2($str,$name){
    		if(strlen($str) != 3 || ereg("[^0-9]",$str)){
      		print("<html><head><title>入力エラー</title></head><body><h1>入力エラー</h1>");
      		print($name." は正しい数値を入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}
	function dataCheckNumber3($str,$name){
    		if(strlen($str) != 4 || ereg("[^0-9]",$str)){
      		print("<html><head><title>入力エラー</title></head><body><h1>入力エラー</h1>");
      		print($name." は正しい数値を入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}

	function dataCheckNull($str,$name){
    		if(strlen($str) == 0 ){
      		print("<html><head><title>入力エラー</title></head><body><h1>入力エラー</h1>");
      		print($name." に値をを入力してください。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;
    		}
  	}
	// 接続設定
	$dbtype = "mysql";
	$sv = "172.20.17.202";
	$dbname = "riceshop";
	$user = "admin";
	$pass = "1111";

	// データベースに接続
	$dsn = "$dbtype:dbname=$dbname;host=$sv";
	$conn = new PDO($dsn, $user, $pass);
	$sql = "SELECT * FROM member WHERE m_code = $m_code AND m_pass = $m_pass";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	if(!($row = $stmt->fetch())){
		print("<html><head><title>入力エラー</title></head><body><h1>入力エラー</h1>");
      		print(" 会員コードおよびパスワードが違います。<br /><br />\n");
      		print("<a href=\"#\" onClick=\"history.back(); return false;\">再入力</a>\n");
      		print("</body></html>");
      		exit;

	}
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>米販売システム_商品購入_宛先変更確認</title>
<body>
<center><h1>注文者情報入力　→　<font color="#FF0000">注文内容確認</font>　→　完了</h1></center>
<!--買い物のかごの内容を表示、確認 -->
<table border="3" align="center">
<caption><h3>購入商品一覧</h3></caption>
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
<tr align="center" valign="center"><td>ポイント値引き</td><td colspan="2"></td>
<?php
	$arr_chk   = $_POST['point'];
	$m_point = 0;
	$on ="0";
	$flg=0;
	if($arr_chk[0] == "1"){
	  $st = $pdo->prepare("SELECT * FROM point WHERE p_m_code = ? ;");
          $st->execute(array($m_code));
          $row = $st->fetch();
	  $m_point = $row['p_poin'];
	  if($m_point > $sum_pri){
		$a_point = $sum_pri;
	  	$nokori_poin = $m_point - $sum_pri; 
		$flg=1;
		$sum_poin = 0; 
	  }
	  $on = "1";
	}	
?>
<td>-<?php if($flg == 1){echo number_format($sum_pri);} else {echo number_format($m_point);} ?>円</td><td>-<?php if($flg == 1){echo number_format($sum_pri);} else{echo number_format($m_point);} $sum_pri = $sum_pri - $m_point; ?>pt</td></tr>
<tr align="center" valign="center"><td>合計</td><td colspan="2"></td><td><?php if($sum_pri < 0){	$sum_pri = 0;	} echo number_format($sum_pri); ?>円</td><td><?php echo number_format($sum_poin); ?>pt</td></tr>
</table>
<br>
<center><font color="#FF0000">商品を削除する場合はカートで行ってください</font><br>
<h2><a href="cart.php" >カートに戻る</a></h2></center>

<?php


// データの取得
$sql = "SELECT * FROM member WHERE m_code = $m_code AND m_pass = $m_pass";
$stmt = $conn->prepare($sql);
$stmt->execute();



// 取得したデータを一覧表示
while ($row = $stmt->fetch()) {
     $name = htmlspecialchars($row['m_name']);
     $h_tel = htmlspecialchars($row['m_tel']);
     $h_mail = htmlspecialchars($row['m_mail']);
}
?>

<table border="3" align="center" width=800 >
<caption><h3>1.注文者情報</h3></caption>
<form action="m_item_buy_finish.php" method="post" >
<tr>	<td width=180>お名前</td>
	<td>
	<?php
		echo $name;
		echo "<input type=\"hidden\" name=\"name\" value=\""; 
		echo $name;
		echo "\" />";
	?>
	</td>
</tr>
<tr>	<td width=180>電話番号</td>
	<td>
	<?php
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
		echo $h_mail;
		echo "<input type=\"hidden\" name=\"h_mail\" value=\""; 
		echo $h_mail;
		echo "\" />";
	?>		
	</td>
</tr>
<tr>	<td width=180>宛先郵便番号</td>
	<td>
	<?php
		$h_pos = $f_pos."-".$b_pos;
		echo $h_pos;
		echo "<input type=\"hidden\" name=\"bf_pos\" value=\""; 
		echo $f_pos.$b_pos;
		echo "\" />";
		echo "<input type=\"hidden\" name=\"h_pos\" value=\""; 
		echo $h_pos;
		echo "\" />";
	?>
	</td>
</tr>


<tr>	<td width=180>宛先住所</td>
	<td>
	<?php
		echo $h_add;
		echo "<input type=\"hidden\" name=\"h_add\" value=\""; 
		echo $h_add;
		echo "\" />";
		echo "<input type=\"hidden\" name=\"on\" value=\""; 
		echo $on;
		echo "\" />";
		echo "<input type=\"hidden\" name=\"mb_code\" value=\""; 
		echo $m_code;
		echo "\" />";
	?>
	</td>
</tr>
<tr align="center" valign="center"><td colspan="2">訂正がある場合は<a href="m_item_buy_henkou.php" >こちら</a></td></tr>
<tr align="center" valign="center"><td colspan="2" ><input type="submit" value="購入" /></td></tr>

</form>
</table>
