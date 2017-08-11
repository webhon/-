<?
	$var = $_POST["var"];
	$value = $_POST["value"];

	${$var} = $value;
	echo "수행되는 문장 : \$$var = $value";
?>