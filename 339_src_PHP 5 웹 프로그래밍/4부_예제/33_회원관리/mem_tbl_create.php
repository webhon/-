<?
$tbl_name;

include "./mem_con.php.inc";          //���� ��Ŭ���-�������� �� �����ͺ��̽� ����

$sql="create table $tbl_name (".
	"m_num int primary key not null auto_increment,".
	"m_id varchar(30) not null,".
	"m_pass varchar(100) not null,".
	"m_email varchar(30) not null,".
	"m_dat datetime not null,".
	"m_usrip varchar(30) not null".
	")";                           //SQL ������
$result=mysql_query($sql,$db);        //���� ����

if(!$result)
{
	echo mysql_errno()." : ".mysql_error();
        mysql_close($db);  //���� ���� ����
	exit;
}

mysql_close($db);                     //���� ���� ����

echo $tbl_name." ���̺��� �ۼ��Ǿ����ϴ�.";
?>
