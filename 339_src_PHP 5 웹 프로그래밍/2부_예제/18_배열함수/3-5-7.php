<?

$t="1982/9/20/7/41/15";
list($year, $month, $day, $hour, $min, $time) = split('/', $t);
echo("�Է°�:" . $year . "��" . $month . "��" . $day . "��" . $hour . "��" . $min . "��" . $time . "��<br>");


$a=time();                              
$b=mktime($hour, $min, $time, $month, $day, $year);       
$c=$a-$b;                                 
$d=intval($c/86400);                      
$e=intval(($c % 86400) / 3600);         
$f=intval((($c % 86400) % 3600) / 60);   
$g=intval((($c % 86400) % 3600) % 60); 
echo("��ƿ� �ð�:" . $d . "��" . $e . "�ð�" . $f . "��" . $g . "��");
?>
