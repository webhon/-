<?
class Hap { // Ŭ���� �̸�
	var $sum; // �� ���ϴ� ����

	function add($a,$b) // add()�� ����� ���� �Լ�
	{
		$this->sum=$a+$b;
		echo "�� = ".$this->sum;
	}
}

$obj=new Hap;		//Ŭ���� ����
$obj->add(50,30);	//�Լ� ȣ��
?>
