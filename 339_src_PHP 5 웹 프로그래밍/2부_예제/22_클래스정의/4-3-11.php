<?php
final class test01 {
	public function exam() {
		echo "�����Դϴ�.";
	}
}

class test02 extends test01 {
	function print_out() {
		parent::exam();
		echo "��ӵ˴ϴ�.";
	}
}

$obj = new test02;
$obj -> print_out();
?>
