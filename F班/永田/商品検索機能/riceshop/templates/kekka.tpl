<html>
<head>
<title>{$keywords}:��������</title>
</head>

<body>

<h1>{$keywords}�̌�������</h1>
<p>�y�[�W�X�V��:{$smarty.now|date_format:'%Y/%m/%d'} </p>

<!-- ���������珤�i�������ʂ�\��  -->
{foreach from=$list_y item=row }
<div>
<p><a href="{$row.url}" target="_blank">
<img src="{$row.img}" border="0" alt="{$row.title}" /></a></p>
<p><a href="{$row.url}" target="_blank">{$row.title}</a></p>
<p><b>{$row.price}�~</b></p>
<p>{$row.caption} </p>
<p>{$row.Description} </p>
<p>�y���ϕ]���z�F{$row.reviewAverage}�i�T�_���_�j </p>
<p><a href="{$row.url}" target="_blank">�ڂ����͂�����</a></p>
</div>
{/foreach}
<!-- �������܂�  -->

<br clear="all">

<!-- WEB�T�[�r�X�̃N���W�b�g�\��  -->
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif"
width="105" height="17" title="Web�T�[�r�X by Yahoo! JAPAN"
alt="Web�T�[�r�X by Yahoo! JAPAN" border="0" ></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->

</body>
</html>

