<?
	$id=$_POST["id"];
	$passwd1=$_POST["passwd1"];
	$passwd1=md5($passwd1);
	$passwd2=$_POST["passwd2"];
	$passwd2=md5($passwd2);
	$sname=$_POST["sname"];
	$sno=$_POST["sno"];
	$dept=$_POST["dept"];
	$year=$_POST["year"];
	$email=$_POST["email"];

	if ($passwd1 == $passwd2) {
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[����ȵ�]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

		$query = "insert into USER values('$id', '$passwd1', '$sname', '$sno', '$dept', $year, '$enmail')";
		$result = mysql_query($query);
		if (!$result) die("[SQL ����]".mysql_error());
		echo "[��ϵǾ����ϴ�]<a href=\"pgm09-13.html\">�α���</a>";
		mysql_close($dbconnect);
	}
	else {
			echo "��ȣ�� ��ġ���� �ʽ��ϴ�. �ٽ� �Է��Ͻñ� �ٶ��ϴ�. <a href=ex09-01.php>�����Է�</a>"; 
	}
?>