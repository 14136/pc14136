php

 --------------------------------------------------------
  ���t�[�V���b�s���O�̏��i����������X�N���v�g
 --------------------------------------------------------

HTML�t�H�[������L�[���[�h���擾
$keywords = $_POST[keyword];

�t�H�[�����󂾂����Ƃ��̑�փL�[���[�h
if($keywords == null){$keywords=�󂠂�;}

�L�[���[�h�̊m�F
print($keywords);
 ---------------- �ݒ蕔�� ------------------------------

���t�[�A�v���P�[�V����ID
$DEVELOPER_ID = �����t�[�A�v���P�[�V����ID��;

API�T�[�o�[��URL
$API_BASE_URL = httpshopping.yahooapis.jpShoppingWebServiceV1;

�I�y���[�V�����̑I���i����͏��i�����j
$OPERATION      = itemSearch;

�������ʐ��̐ݒ�i���t�[�V���b�s���O�͍ő�T�O�j
$max_num = 5;

�\�[�g���i�������ʂ̕��ו��j+price,-score,+sold�Ȃ�
$ysort ='-score';

UTF-8��URL�G���R�[�h
$key = urlencode(mb_convert_encoding($keywords,UTF-8,auto));
$ysort = urlencode(mb_convert_encoding($ysort,UTF-8,auto));

 ---------------- �X�}�[�e�B���g������ --------------------------- 

require_once('.SmartylibsSmarty.class.php');
$smarty = new Smarty();
$smarty-template_dir = '.templates';
$smarty-compile_dir  = '.templates_c';
$smarty-config_dir   = '.configs';
$smarty-cache_dir    = '.cache';
$smarty-caching = 0;
$smarty-cache_lifetime = 6060;
0�̓L���b�V���������Ȃ��B�Q�̓��C�t�^�C��

 �L���b�V��id��o�^�B
if(!$cache_id){$cache_id = md5($keywords.$ysort);}
 ---------------- ���i�����X�^�[�g ------------------------ 

 API�ւ̃��N�G�X�gURL����
$api_url = $API_BASE_URL.$OPERATION.appid=.$DEVELOPER_ID
.&query=.$key.&hits=.$max_num.&sort=.$ysort.&availability=1;

echo $api_url;

API����̃��X�|���X���擾(file_get_contents�֐�)
$contents = file_get_contents($api_url);

XML�t�@�C���𕪉�(simplexml_load_string�֐�)
$xml = simplexml_load_string($contents);
print_r($xml);

����������0���łȂ��ꍇ,�ϐ�$hits�Ɍ������ʂ��i�[���܂��B
if ($xml[totalResultsReturned] != 0) {
$hits = $xml-Result-Hit;

 ���������f�[�^�����Ԃɔz��($list_y)�Ɋi�[
unset($list_y);

$i = 0;
foreach($hits as $hit){
$list_y[$i]['title'] = mb_strimwidth ($hit-Name,0,50, , UTF-8);
$list_y[$i]['Description'] = mb_strimwidth ($hit-Description, 0,300, , UTF-8).�E�E;
$list_y[$i]['url'] = $hit-Url;
$list_y[$i]['img'] = $hit-Image-Medium;
$list_y[$i]['price'] = $hit-Price;
$list_y[$i]['reviewAverage'] = $hit-Review-Rate;
$list_y[$i]['reviewCount'] = $hit-Review-Count;
$list_y[$i]['reviewURL'] = $hit-Review-Url;
$i++;
}

print_r($list_y);

}else{�������ʂ��O�̂Ƃ�
print(���������ɍ������ʂ́A������܂���ł����B);
}
 ---------------- ���i�y�[�W�쐬 --------------------------- 

 �X�}�[�e�B�Ƀf�[�^�𑗂�
$smarty-assign(keywords,$keywords);
$smarty-assign(list_y,$list_y);

�e���v���[�g���Ăяo���ĕ\��
$smarty-display('kekka.tpl',$cache_id);

�I���


