<?php
$str="����ϴ� ���� ����";

$en_str=urlencode($str);

echo "���ڵ��� ���� : ".$en_str;
echo "<br><br><br>";
echo "���ڵ��� ���� : ".urldecode($en_str);
?>
