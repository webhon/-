<?php
$dir="./imsi/";
$cnt=0;

$dir_handle=opendir($dir);		//���丮 ����

while(($file_handle=readdir($dir_handle)) != false)    //���丮 ������ �о� ����
{
	echo "���ϸ� : ".$file_handle."<br>";         //���ϸ� ���
	rewinddir($dir_handle);                      //�����͸� ó������ ��ġ

	$cnt++;
	if($cnt==5) break;
}
closedir($dir_handle);
?>
