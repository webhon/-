<?
	$id = $_POST["id"];
	$name = $_POST["name"];
	$addr = $_POST["addr"];
	$email = $_POST["email"];
 
	if (ereg("[[:alpha:]][a-zA-Z0-9_]{1,9}", $id))
		echo "[$id] 올바른 아이디입니다.<br>";
	else 
		echo "[$id] 바른 포맷이 아닙니다. 다시 입력하십시오.<br>";
	if (ereg("[^[:space:]]+", $name))
		echo "[$name] 올바른 이름입니다.<br>";
	else 
		echo "[$name] 바른 포맷이 아닙니다. 다시 입력하십시오.<br>";
	if (ereg("[^[:space:]]+", $addr))
		echo "[$addr] 올바른 주소입니다.<br>";
	else 
		echo "[$addr] 바른 포맷이 아닙니다. 다시 입력하십시오.<br>";
	if (ereg("^[_a-zA-Z][_a-zA-Z0-9\.]*@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]){1,3}$", $email))
		echo "[$email] 올바른 이메일 주소입니다.<br>";
	else 
		echo "[$email]은 바른 포맷이 아닙니다. 다시 입력하십시오.<br>";
?> 