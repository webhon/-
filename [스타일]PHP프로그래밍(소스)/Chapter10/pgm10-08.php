<?
	session_start();

	$_SESSION["id"] = "kildong";

	echo "<p>현재 세션 ID : ".session_id()."<br>\n";
	echo "<p>현재 세션 정보의 저장 위치 : ".session_save_path()."<br>\n";
?>