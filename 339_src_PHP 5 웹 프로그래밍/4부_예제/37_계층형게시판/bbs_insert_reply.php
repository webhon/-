<?php
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");

$tablename = "msboard";

//�亯 ��(reply.php)���� ���۵� ������ ������ ����ϴ�.
$name = addslashes($name);
$password = addslashes($password);
$email = addslashes($email);
$homepage = addslashes($homepage);
$subject = addslashes($subject);
$memo = addslashes($memo);

//����Ʈ ���� �ʿ��� �������� ����Ʈ ���� �ֽ��ϴ�.
$writetime = time();
$ip = getenv("REMOTE_ADDR");
$count = 0;


// �θ���� ������ ��ȸ�ϱ� ���� ���� ����
$sql = "select * from $tablename where number='$number'";
$result = mysql_query($sql) or die (mysql_error().$sql);
$array = mysql_fetch_array($result);

$depth = strpos($array[replylv], "A");

if(!$depth){
	echo "�� �̻� ������� ������ �� �����ϴ�.";
}

$likestr = $array[replylv];
$likestr[$depth] = "_";

$sql = "select replylv from $tablename where parentno = $array[parentno] and replylv like '$likestr' order by replylv desc limit 1";

$reply_result = mysql_query($sql) or die (mysql_error.$sql);
$reply_array = mysql_fetch_array($reply_result);
$reply = trim($reply_array[replylv]);

$reply_str=$reply[$depth];
$reply_str = ++$reply_str;

$reply[$depth] = $reply_str;

//SQL ����� �̿��� �Է¹��� ����� ����Ʈ�� ���� MySQL�� �Է�(insert)�մϴ�.
$sql = "insert into $tablename (name,password,email,homepage,subject,memo,count,ip,writetime,parentno,replylv) 
        values('$name','$password','$email','$homepage','$subject','$memo',$count,'$ip',$writetime,$array[parentno],'$reply')"; 

mysql_query($sql) or die (mysql_error().$sql);

mysql_close();

//�� �Է��� �Ϸ�Ǹ� ��� ���� �������� �ڵ� �̵��ϵ��� �մϴ� 
if ($msg=='') {
	$msg = "���������� ��ϵǾ����ϴ�"; 
	 echo " <html><head> 
                 <script name=javascript> 
                  if('$msg' != '') { 
                         self.window.alert('$msg'); 
                 } 
                 location.href='bbs_list.php?page=$page'; 
                 </script> 
                 </head> 
                 </html> "; 
} else {
	 echo " <html><head> 
                 <script name=javascript> 
                 if('$msg' != '') { 
                         self.window.alert('$msg'); 
                 } 
                 history.go(-1);
                 </script> 
                 </head> 
                 </html> "; 
}

?>