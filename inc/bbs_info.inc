<?

// �Խ��� ����
$sql = "select * from wiz_bbspro where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$bbs_info = mysql_fetch_object($result);
if($total <= 0 || $bbs_info->usetype != "Y") error("�ش�Խ����� �������� �ʽ��ϴ�.");

if($bbs_info->titleimg != "") $subimg = "<img src=/bbs/upfile/$bbs_info->titleimg>";


?>