<?php
$dir="./imsi/";

if($dir_handle=opendir($dir))		//���丮�� ����
{
	while(($file_handle=readdir($dir_handle)) != false)//���µ� ���丮 ���� �б�
	{
		echo "���ϸ� : ".$file_handle;
		echo "&nbsp;&nbsp;&nbsp;����Ÿ�� : ";
		echo filetype($dir.$file_handle)."<br>";	//����Ÿ�� ���
	}
}
closedir($dir_handle);		//�� ���丮 ����
?>
