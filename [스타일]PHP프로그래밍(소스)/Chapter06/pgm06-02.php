<?
	$path = $_POST["open"];

	if ( !($fp = fopen($path, "r") ) ) {
		echo "[$path] ���� ���濡 �����Ͽ����ϴ�.";
	}
	else {
		echo "[$path] ���� ���濡 �����Ͽ����ϴ�.";
	}
?>