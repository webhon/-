<?
class Change {
	var $val;

	function setValue($ar_num,$num)
	{
		$this->val[$ar_num]=$num;
		echo "ar_num = $ar_num<br>";
		echo "num = $num<br>";
		echo "val = ".$this->val[$ar_num];
	}

	function compareValue($ar_num,$num)
	{
		if($this->val[$ar_num]>$num)
		{
			$this->val[$ar_num]-=$num;
			echo "val = ".$this->val[$ar_num];
			return true;
		} else {
			return false;
		}
	}
}

$obj=new Change;		//Ŭ���� ����
$obj->setValue(10,1);		//�Լ� ȣ��

echo "<p>";

$obj->compareValue(10,-1);	//�Լ� ȣ��
?>
