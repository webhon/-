<?
class FontChanger {
	function font_color($str, $font_color, $font_size)
	{
		echo "<font color=$font_color size=$font_size>";
		echo "$str</font><br>";
	}
}

$obj=new FontChanger;				//Ŭ���� ����
$obj->font_color('I Love Korea!!!','blue',10);	//�Լ� ȣ��
$obj->font_color('Welcome To Korea!!!','red',7);	//�Լ� ȣ��
?>
