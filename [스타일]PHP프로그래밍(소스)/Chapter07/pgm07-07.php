<?
	$id = $_POST["id"];
	$name = $_POST["name"];
	$addr = $_POST["addr"];
	$email = $_POST["email"];
 
	if (ereg("[[:alpha:]][a-zA-Z0-9_]{1,9}", $id))
		echo "[$id] �ùٸ� ���̵��Դϴ�.<br>";
	else 
		echo "[$id] �ٸ� ������ �ƴմϴ�. �ٽ� �Է��Ͻʽÿ�.<br>";
	if (ereg("[^[:space:]]+", $name))
		echo "[$name] �ùٸ� �̸��Դϴ�.<br>";
	else 
		echo "[$name] �ٸ� ������ �ƴմϴ�. �ٽ� �Է��Ͻʽÿ�.<br>";
	if (ereg("[^[:space:]]+", $addr))
		echo "[$addr] �ùٸ� �ּ��Դϴ�.<br>";
	else 
		echo "[$addr] �ٸ� ������ �ƴմϴ�. �ٽ� �Է��Ͻʽÿ�.<br>";
	if (ereg("^[_a-zA-Z][_a-zA-Z0-9\.]*@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]){1,3}$", $email))
		echo "[$email] �ùٸ� �̸��� �ּ��Դϴ�.<br>";
	else 
		echo "[$email]�� �ٸ� ������ �ƴմϴ�. �ٽ� �Է��Ͻʽÿ�.<br>";
?> 