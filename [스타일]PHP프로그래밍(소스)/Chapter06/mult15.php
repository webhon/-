<?
	$flag = $_GET["flag"];

	if (!isset($flag)) {
		$row = $_POST["row"];
		$col = $_POST["col"];

		echo "<form action=\"mult15.php?flag=1&row=$row&col=$col\" method=POST>";
		echo "<table border=1 cellpadding=3>\n";
		for ($i=0; $i <= $row; $i++) {
			echo "<tr>\n";
			for ($j=0; $j <= $col; $j++) {
				if ($i == 0 && $j == 0) echo "<td>&nbsp;</td><br>";
				else if ($i == 0) 
					echo "<td align=\"center\"><b>$j</b></td>\n";
				else if ($j == 0) 
					echo "<td align=\"center\"><b>$i</b></td>\n";
				else {
					echo "<td>";
					echo "<input type=\"text\" name=data[$i][$j] size=2>";
					echo "</td>";
				}
			}

		echo "</tr>\n";
		}
		echo "</table>\n"; 
		echo "<p><input type=\"submit\" value=\"만들기\">";
		echo "</form>";
	}
	else
	{
		$row = $_GET["row"];
		$col = $_GET["col"];
		$data = $_POST["data"] ;

		$fp = fopen("table.html", "w");
		fputs ($fp, "<table border=1 cellpadding=3>\n" );
		for ($i=0; $i <= $row; $i++) {
			fputs ($fp, "<tr>\n" );
			for ($j=0; $j <= $col; $j++) {
				if ($i == 0 && $j == 0) 
					fputs($fp, "<td> &nbsp;</td><br>");
				else if ($i == 0) 
					fputs($fp,"<td align=\"center\"><b>$j</b></td>\n");
				else if ($j == 0) 
					fputs ($fp, "<td align=\"center\"><b>$i</b></td>\n");
				else {
					fputs ($fp, "<td>");
					fputs ($fp, $data[$i][$j]);
					fputs ($fp, "</td>");
				}
			}

		fputs ($fp, "</tr>\n");
		}
		fputs ($fp, "</table>\n"); 
		fclose($fp);

		echo "테이블 파일 [ table.html ]이 생성되었습니다. ";
		echo "<a href=\"table.html\">파일 보기</a>";
	}
?>