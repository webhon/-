<? 
	session_start();

	echo "<html>\n" ;
	echo "<head>\n" ;
	echo "<title>���� ��ٱ��� ����</title>\n" ;
	echo "</head>\n" ;
	echo "<body>\n" ;
	echo "<h1>�� ��ٱ���</h1>\n" ;

	if (isset($_SESSION["books"])) {
		echo "<b>�뿩�� ���� ���</b>\n";
		echo "<ul>\n";
			foreach (unserialize($_SESSION["books"]) as $book) 
			echo "<li> $book </li>" ;
			echo "</ul>";
	}
	else {
		echo "���� �뿩�� ������ �����ϴ�." ;
	}

	echo "<p><a href=\"pgm10-16.php\">��� ���� �뿩�ϱ�</a></p>\n" ;
	echo "</body>\n" ;
	echo "</html>\n" ;
?>