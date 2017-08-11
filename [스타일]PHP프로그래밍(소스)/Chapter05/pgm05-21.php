<?
	$lines = file("book.txt");
     
	echo "<h3><center>도서 대여 현황</center></h3><br>";
	echo "<table border=1 cellpadding=5>\n";
	echo "<tr bgcolor=\"#cccccc\">\n";
	echo "<th>번호</th> <th>학번</th> <th>이름</th> <th>도서명</th>
          <th>출판사명</th> <th>대여일</th><th>반납예정일</th></tr>\n";

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
<a href="pgm05-21.html">계속 입력</a>