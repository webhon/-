<?
function x($a,$b)
{
	$div=intval($a/$b);
	$rest=$a%$b;
	return array($div,$rest);
}

list($c,$d)=x(30,7);

echo ("�� = ".$c."<br>");
echo ("������ = ".$d."<br>");
?>
