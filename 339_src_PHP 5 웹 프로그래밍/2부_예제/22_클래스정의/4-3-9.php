<?php
abstract class test01 {			//�θ� Ŭ���� (�����)
	abstract protected function abc();

	public function print_out() {
		echo $this -> abc();
	}
}

class test02 extends test01 {		//�ڽ� Ŭ���� (��� ����)
	protected function abc() {	//����� �޼ҵ�� ���ڿ� ����
		return "�߻� Ŭ������ �߻� �޼ҵ�\n<p>";
	}
}

$obj=new test02;
echo $obj -> print_out();
?>
