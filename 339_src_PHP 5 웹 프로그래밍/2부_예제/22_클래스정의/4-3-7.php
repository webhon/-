<?
class Base {				//�θ�Ŭ����
  public $a;				//���� ���� (�׻� �ʱⰪ���� ����)
  public static $b;			//���� ��� ���� (���������� ���� ����)
}

class Derived extends Base {		//�ڽ�Ŭ����
  public function __construct() {		//������ �Լ�-Ŭ���� �ν��Ͻ� ���۽� ����
   $this->a = 0;			//���� ������??0??���� �ʱ�ȭ
   parent::$b = 0;			//���� ��� ����??0??���� �ʱ�ȭ
  }
  public function f() {
   $this->a++;				//�׻�??0??���� 1�� ����
   parent::$b++;			//��ȭ�� ������ 1�� ����
  }
}

$i1 = new Derived;
$i2 = new Derived;

$i1 -> f();
echo $i1 -> a, ' ', Derived::$b, "<p>\n";
$i2 -> f();
echo $i2 -> a, ' ', Derived::$b, "<p>\n";
?>
