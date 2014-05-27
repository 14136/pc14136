php

 --------------------------------------------------------
  ヤフーショッピングの商品を検索するスクリプト
 --------------------------------------------------------

HTMLフォームからキーワードを取得
$keywords = $_POST[keyword];

フォームが空だったときの代替キーワード
if($keywords == null){$keywords=訳あり;}

キーワードの確認
print($keywords);
 ---------------- 設定部分 ------------------------------

ヤフーアプリケーションID
$DEVELOPER_ID = ★ヤフーアプリケーションID★;

APIサーバーのURL
$API_BASE_URL = httpshopping.yahooapis.jpShoppingWebServiceV1;

オペレーションの選択（今回は商品検索）
$OPERATION      = itemSearch;

検索結果数の設定（ヤフーショッピングは最大５０）
$max_num = 5;

ソート順（検索結果の並べ方）+price,-score,+soldなど
$ysort ='-score';

UTF-8でURLエンコード
$key = urlencode(mb_convert_encoding($keywords,UTF-8,auto));
$ysort = urlencode(mb_convert_encoding($ysort,UTF-8,auto));

 ---------------- スマーティを使う準備 --------------------------- 

require_once('.SmartylibsSmarty.class.php');
$smarty = new Smarty();
$smarty-template_dir = '.templates';
$smarty-compile_dir  = '.templates_c';
$smarty-config_dir   = '.configs';
$smarty-cache_dir    = '.cache';
$smarty-caching = 0;
$smarty-cache_lifetime = 6060;
0はキャッシュを持たない。２はライフタイム

 キャッシュidを登録。
if(!$cache_id){$cache_id = md5($keywords.$ysort);}
 ---------------- 商品検索スタート ------------------------ 

 APIへのリクエストURL生成
$api_url = $API_BASE_URL.$OPERATION.appid=.$DEVELOPER_ID
.&query=.$key.&hits=.$max_num.&sort=.$ysort.&availability=1;

echo $api_url;

APIからのレスポンスを取得(file_get_contents関数)
$contents = file_get_contents($api_url);

XMLファイルを分解(simplexml_load_string関数)
$xml = simplexml_load_string($contents);
print_r($xml);

検索件数が0件でない場合,変数$hitsに検索結果を格納します。
if ($xml[totalResultsReturned] != 0) {
$hits = $xml-Result-Hit;

 分解したデータを順番に配列($list_y)に格納
unset($list_y);

$i = 0;
foreach($hits as $hit){
$list_y[$i]['title'] = mb_strimwidth ($hit-Name,0,50, , UTF-8);
$list_y[$i]['Description'] = mb_strimwidth ($hit-Description, 0,300, , UTF-8).・・;
$list_y[$i]['url'] = $hit-Url;
$list_y[$i]['img'] = $hit-Image-Medium;
$list_y[$i]['price'] = $hit-Price;
$list_y[$i]['reviewAverage'] = $hit-Review-Rate;
$list_y[$i]['reviewCount'] = $hit-Review-Count;
$list_y[$i]['reviewURL'] = $hit-Review-Url;
$i++;
}

print_r($list_y);

}else{検索結果が０のとき
print(検索条件に合う結果は、見つかりませんでした。);
}
 ---------------- 商品ページ作成 --------------------------- 

 スマーティにデータを送る
$smarty-assign(keywords,$keywords);
$smarty-assign(list_y,$list_y);

テンプレートを呼び出して表示
$smarty-display('kekka.tpl',$cache_id);

終わり


