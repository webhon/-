<?
	$Sequence = 1;

	function PrintHeading($string) {
		global $Sequence;
		echo "<p> <h3> [".$Sequence++."] $string </h3>";
	}
	function PrintBody($string) {
		echo "<p> $string ";
	}

	PrintHeading("PHP ����");
	PrintBody("PHP�� �������ؽ�Ʈ ��ó����(\"PHP: Hypertext Preprocessor\")�� �ǹ��ϸ�, �θ� ���̴� ���� �ҽ� �Ϲ� ��ũ��Ʈ ����̴�.");
	PrintHeading("PHP �Լ�");
	PrintBody("�Լ�(function)�� Ư�� �۾�(��ɾ���� ����)�� �ݺ��Ǵ� ��� ���α׷� ���� �� ������ �� �۾��� �����ϰ� �ʿ��� ������ ȣ���� �� �ִ� �ϳ��� ������ �����̴�. �Ϲ������� ���α׷��� ������ �����α׷� �Ǵ� ���(module)�̶�� �θ���. �Լ��� �ʿ��� �� �������� ȣ���� �����ϱ� ������ Ư�� �۾��� �ݺ��ؾ� �ϴ� ��� �ſ� ȿ�����̴�. ����, �� ���� ��Ƶξ��� ������ ������ �����ϴ�.");

?>
