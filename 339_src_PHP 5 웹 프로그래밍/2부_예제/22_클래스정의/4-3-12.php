<?php
class MyCloneable {
   static $id = 0;

   function __construct() {		//������ �Լ�
       $this->id = self::$id++;
   }

   function __clone() {
       $this->address = "����";
       $this->id = self::$id++;
   }
}

$obj = new MyCloneable;			//��ü ����
$obj->address = "�λ�";			//address������ "�λ�"����
print $obj->id . "\n<p>";		//������ �Լ��� ���� 1�����Ǿ� ��� - 1

$obj_cloned = clone $obj;		//��ü ���翡 ���� __clone()�Լ� ����

print $obj_cloned->id . "\n<br>";	//__clone()�Լ��� ���� 1�����Ǿ� ��� - 2
print $obj_cloned->address . "\n";	//"�λ�"�̶�� ���������� "����" ���
?> 
