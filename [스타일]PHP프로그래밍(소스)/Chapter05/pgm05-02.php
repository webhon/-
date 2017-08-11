<?
	function print_msg($msg, $v)
	{
		echo "$msg : [ <b> $v </b> ].<br>";
	}

	$prompt = $_POST["prompt"];
	$value = $_POST["value"];

	print_msg($prompt, $value);
?>