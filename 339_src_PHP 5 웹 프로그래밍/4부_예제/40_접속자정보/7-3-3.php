<?php
	$browser=$HTTP_USER_AGENT;

	if(eregi("compatible; MSIE 6.0;",$browser)) { 
		$bgcolor="magenta"; 
		//������� �������� ���ͳ� �ͽ��÷η��̸� ��������ȫ��������
	}
	else {
		$bgcolor="blue";                             //�� �� �������̸� ���Ķ����� ������
	}

	echo "
	<html>
	<head><title>���� �ٲٱ�</title></head>

	<body bgcolor='$bgcolor'>		                 //������ �������� ���� ����

	</body>
	</html>
	";
?>
