<?
	$no = $_POST["no"];

	$a1 = array(1, 2, 3, 4, 5);
	$a2 = array(10, 20, 30, 40, 50);
	$a3 = array("A", "B", "C", "D", "E");
	
	$arrayname = "a".$no;
	print_r($${arrayname});
?>