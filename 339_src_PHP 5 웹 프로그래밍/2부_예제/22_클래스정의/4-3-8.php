<?php
class abc {
   const avar = "abc's";			//Ŭ���� ��� ����
   function show() {
       echo self::avar . "\r\n";
   }
}

class def extends abc {
   const avar = "def's";
   function showmore() {
       echo self::avar . "\r\n";
       echo "<p>";
       $this -> show();
   }
}

$bob = new def();		//Ŭ���� ����
$bob -> showmore();		//�Լ� ȣ��
?>
