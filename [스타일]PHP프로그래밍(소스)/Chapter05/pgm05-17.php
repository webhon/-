<?
	$year = $_POST["year"];
	$month = $_POST["month"];

	$space = 0;

	$max = date( "t", mktime(0, 0, 0, $month, 1, $year) );
	$day = date( "l", mktime(0, 0, 0, $month, 1, $year) );
	
	switch( $day )
	{
		case 'Monday' : $space = 1; break;
		case 'Tuesday' : $space = 2; break;
		case 'Wednesday' : $space = 3; break;
		case 'Thursday' : $space = 4; break;
		case 'Friday' : $space = 5; break;
		case 'Saturday' : $space = 6; break;
	}					
	echo "<center>\n";
	echo "<h2>".$year."년 ".$month."월 달력";
	if( ($year % 4 == 0) && ($year % 100 != 0) ) echo "(윤년)</h2>\n";
		else if( $year % 400 == 0 ) echo "(윤년)</h2>\n";
		else echo "</h2>\n";
?>
	<table border=1 cellpadding=10>
		<tr bgcolor="#cccccc">
			<td>일</td><td>월</td><td>화</td><td>수</td>
			<td>목</td><td>금</td><td>토</td>
		</tr>
<?
	$nl = $space;
	$check = 1;
 
	if( $nl != 0 ) {
		echo "<tr>\n";
		for( $j = 0; $j < $space; $j++ )
			echo "<td bgcolor=\"#ffcccc\">&nbsp;</td>\n";
	}
	for( $i = 1; $i <= $max; $i++ ) {
		if( $nl == 0 ) echo "<tr>\n";
 
		if( $i <= $max ) echo "<td>".$i."</td>\n";
			$nl++;
		if( $nl == 7 ) {
			$nl = 0;
			$check++;
			echo "</tr>\n\n";
		}
	}
	for( $i = 0; $i < $check * 7 - $max - $space; $i++ )
		echo "<td bgcolor=\"#ffcccc\">&nbsp;</td>\n";
		echo "</tr>\n\n"
?>
	</table>
</center>