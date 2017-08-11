<?
	$path = $_POST["open"];

	if ( !($fp = fopen($path, "r") ) ) {
		echo "[$path] 파일 개방에 실패하였습니다.";
	}
	else {
		echo "[$path] 파일 개방에 성공하였습니다.";
	}
?>