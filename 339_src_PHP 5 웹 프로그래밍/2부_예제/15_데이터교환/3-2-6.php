<?php
	$data1 = $_POST["check1"];
	$data2 = $_POST["check2"];
	$data3 = $_POST["check3"];
	$data4 = $_POST["check4"];
	$data5 = $_POST["group1"];
	$data6 = $_POST["group2"];

	echo "<H5>���� �оߴ� :";
	if($data1){
	   echo(" ���� ���");
	} 
	if($data2) {
	    echo(" ���,�ڵ���");
	}
	if($data3) {
	    echo(" ������,����");
	}
	if($data4) {
	    echo(" ����,�Ż�ǰ");
	}

	echo("<BR><BR><BR>���� : $data5");
	echo("<BR><BR><BR>��ȥ���� : $data6 </H5>"); 
?>
