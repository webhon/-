<?php
interface int_class {		//�������̽� Ŭ����
	function ex();
}

class test01 implements int_class {
	function ex() {
		echo "�������̽�";
	}
}

$obj=new test01;
$obj -> ex();
?>
