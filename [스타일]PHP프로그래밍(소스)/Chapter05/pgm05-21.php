<?
	$lines = file("book.txt");
     
	echo "<h3><center>���� �뿩 ��Ȳ</center></h3><br>";
	echo "<table border=1 cellpadding=5>\n";
	echo "<tr bgcolor=\"#cccccc\">\n";
	echo "<th>��ȣ</th> <th>�й�</th> <th>�̸�</th> <th>������</th>
          <th>���ǻ��</th> <th>�뿩��</th><th>�ݳ�������</th></tr>\n";

	$no = 1;
	foreach ($lines as $line) {
	$borrow = split(":", $line);
	echo "<tr>\n";
	echo "<td align=\"center\"> $no</td>";
	for ($i=0; $i<sizeof($borrow); $i++) 
		echo "<td align=\"center\">".$borrow[$i]."</td>\n";
		echo "</tr>\n";
		$no++;
	}
?>
<a href="pgm05-21.html">��� �Է�</a>