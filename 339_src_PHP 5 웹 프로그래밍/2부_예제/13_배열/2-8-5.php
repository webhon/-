<?
$flower=array("���","����ȭ","���޷�","�عٶ��","ƫ��");
echo current($flower)."<p>";
next($flower);
next($flower);
echo current($flower)."<p>";
prev($flower);
echo current($flower)."<p>";
reset($flower);
echo current($flower)."<p>";
?>
