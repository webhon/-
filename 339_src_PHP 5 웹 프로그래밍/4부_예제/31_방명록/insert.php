<?
$host="localhost";
$usr="master";
$pwd="123";

$db=mysql_connect($host,$usr,$pwd) or die("���� ���� ����");
mysql_select_db("guestboard",$db);

$irum; $content;
$usrip=$REMOTE_ADDR; // ������� IP�ּҸ� �о�ɴϴ�.

$sql="insert into guest_tbl (".
	"irum,content,wdate,usrip".
	") values (".
	"'$irum','$content',now(),'$usrip'".
	")";
$result=mysql_query($sql,$db);

mysql_close($db);

echo "
<script language='javascript'>
	location.href='./list.php';
</script>
";
?>
