<?
	session_start();

	$_SESSION["id"] = "kildong";

	echo "<p>���� ���� ID : ".session_id()."<br>\n";
	echo "<p>���� ���� ������ ���� ��ġ : ".session_save_path()."<br>\n";
?>