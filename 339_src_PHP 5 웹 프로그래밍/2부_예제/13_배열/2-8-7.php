<?
$flower=array("RED"=>"���","YELLOW"=>"�عٶ��","PURPLE"=>"ƫ��");
ksort($flower);		
while(list($key,$value) = each($flower))
	print "$key -> $value<br>";
?>
