<?
	$orig = $_POST["orig"];
	$dupl = $_POST["dupl"];

	if(!copy($orig, $dupl)) {
		echo "������ �������� ���߽��ϴ�.";
	}
	else {
		echo "���������� [$dupl] ������ �����Ͽ����ϴ�.";
	}
?>  