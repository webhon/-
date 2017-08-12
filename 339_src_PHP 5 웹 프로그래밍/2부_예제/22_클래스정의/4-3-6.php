<?php
class Foo {				//�θ�Ŭ���� ---> �� ��°�� ����
   private function aPrivateMethod() {
       echo "Foo::aPrivateMethod() called.\n<br>";	// ------------------>��
   }

   protected function aProtectedMethod() {
       echo "Foo::aProtectedMethod() called.\n<br>";	// ------------------>��
       $this->aPrivateMethod();  //private�� FooŬ���� �ȿ����� ���డ��------->��
   }
}

class Bar extends Foo {		//�ڽ�Ŭ����
   public function aPublicMethod() {
       echo "Bar::aPublicMethod() called.\n<br>";	//ù��°�� ���� -------->��
       $this->aProtectedMethod(); //protected�� ȣ���Ͽ� ���� --------------->��

   }
}

$obj = new Bar;
$obj -> aPublicMethod();	  //class Bar�� aPublicMethod() ȣ�� --------->��
?>
