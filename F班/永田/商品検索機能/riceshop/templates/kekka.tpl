<html>
<head>
<title>{$keywords}:調査結果</title>
</head>

<body>

<h1>{$keywords}の検索結果</h1>
<p>ページ更新日:{$smarty.now|date_format:'%Y/%m/%d'} </p>

<!-- ■ここから商品検索結果を表示  -->
{foreach from=$list_y item=row }
<div>
<p><a href="{$row.url}" target="_blank">
<img src="{$row.img}" border="0" alt="{$row.title}" /></a></p>
<p><a href="{$row.url}" target="_blank">{$row.title}</a></p>
<p><b>{$row.price}円</b></p>
<p>{$row.caption} </p>
<p>{$row.Description} </p>
<p>【平均評価】：{$row.reviewAverage}（５点満点） </p>
<p><a href="{$row.url}" target="_blank">詳しくはこちら</a></p>
</div>
{/foreach}
<!-- ■ここまで  -->

<br clear="all">

<!-- WEBサービスのクレジット表示  -->
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif"
width="105" height="17" title="Webサービス by Yahoo! JAPAN"
alt="Webサービス by Yahoo! JAPAN" border="0" ></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->

</body>
</html>

