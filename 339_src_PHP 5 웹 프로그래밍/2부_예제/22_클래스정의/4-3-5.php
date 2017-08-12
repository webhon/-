<?php
class MyClass {					//�θ� Ŭ����
   private $Hello = "Hello, World!\n";		//MyClass������ ��밡��
   protected $Bar = "Hello, Bar!\n";		//MyClass, MyClass2���� ��밡��
   protected $Foo = "Hello, Foo!\n";		//MyClass, MyClass2���� ��밡��

   function printHello() { //MyClass�� printHello() ����� ���� �Լ�
       print "MyClass::printHello() " . $this->Hello . "<br>";
       print "MyClass::printHello() " . $this->Bar . "<br>";
       print "MyClass::printHello() " . $this->Foo . "<br>";
   }
}

class MyClass2 extends MyClass {	//MyClass�� �θ�Ŭ������ �� �ڽ�Ŭ����
   protected $Foo;			//���⼭�� $Foo�� MyClass�� $Foo�� �ƴ�
           				//$Foo ��� ������ ����Ǿ� ����
   function printHello() {  //MyClass2�� printHello() ����� ���� �Լ�
       MyClass::printHello();		//�θ�Ŭ������ �޼ҵ带 ����
       print "<p>";
       print "MyClass2::printHello() " . $this->Hello . "<br>";
       print "MyClass2::printHello() " . $this->Bar . "<br>";
       print "MyClass2::printHello() " . $this->Foo . "<br>";
   }
}

$obj01 = new MyClass;
$obj01 -> printHello();

echo "<p>";

$obj02 = new MyClass2;
$obj02 -> printHello();
?>
