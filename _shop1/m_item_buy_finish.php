﻿<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>米販売システム_商品購入_完了</title>
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
<?php
        require 'common.php';
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
<tr align="center" valign="center"><td>ポイント値引き</td><td></td><td></td>
<?php
	$on = htmlspecialchars($_POST['on']);
	$m_code = $_SESSION['mb_code'] ;
	$m_point = 0;
	$u_poin = 0;
	$st = $pdo->prepare("SELECT * FROM point WHERE p_m_code = ? ;");
        $st->execute(array($m_code));
        $row = $st->fetch();
	if($on == "1"){
	  $m_point = $row['p_poin'];
	  if($m_point > $sum_pri){
	  	$nokori_poin = $m_poin - $sum_pri; 
	  }
	  $on = "1";
	  $st = $pdo->prepare("UPDATE point SET p_poin = ? WHERE p_m_code = ? ;");
          $st->execute(array($sum_poin,$m_code));
	  $u_poin = $sum_poin + $nokori_poin;
	}else{
	  echo $row['p_poin'];
	  $u_poin = $row['p_poin'] + $sum_poin;
	  $st = $pdo->prepare("UPDATE point SET p_poin = ? WHERE p_m_code = ? ;");
          $st->execute(array($u_poin,$m_code));
	}

?>
<td>-<?php echo $m_point; $sum_pri = $sum_pri - $m_point; ?>円</td><td>-<?php echo $m_point; ?>pt</td></tr>
<tr align="center" valign="center"><td>合計</td><td></td><td></td><td><?php if($sum_pri < 0){	$sum_pri = 0;	} echo $sum_pri; ?>円</td><td><?php echo $sum_poin; ?>pt</td></tr>
</table>
</table>
<br><center>
<h3>
今回、付与されたポイント数　<?php echo $sum_poin; ?>pt,使用したポイント数　-<?php echo $m_point; ?>pt<br>
お客様の合計ポイント数　<?php echo $u_poin; ?>pt<br>
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
		$h_tel = htmlspecialchars($_POST['h_tel']);
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
<?php
	$h_m_code = $_SESSION['mb_code'];
	$h_date = date("Y/m/d");
	$h_pri = "0";
	foreach($_SESSION['cart'] as $code => $num) {
         $st = $pdo->prepare("INSERT INTO history(`h_m_code`, `h_g_code`, `h_date`, `h_phot`, `h_pri`, `h_name`, `h_add`, `h_tel`, `h_mail`) VALUES(?,?,?,?,?,?,?,?,?)");
         $st->execute(array($h_m_code,$code,$h_date,$num,$h_pri,$name,$h_add,$h_tel,$h_mail));	
	} 
   $_SESSION['cart'] = null;	

?>

</body>
</html>