<?
	include("pgm06-12.inc");
	echo "<h2>���� �����ϱ�</h2>"; 
	$no = $_GET["no"];

	if (file_exists($guestbook)) {
		$lines = file($guestbook);
		$line = $lines[$no];
		list($name, $msg, $passwd) = split(":", $line);

		echo "<form action=\"ex06-05update.php\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"no\" value=".$no.">\n";
		echo "<table border=1 cellpadding=5>\n";
		echo "<tr>\n";
		echo "<td bgcolor=\"#cccccc\" align=\"center\">�ۼ����̸�</td>";
		echo "<td align=\"center\">$name</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td bgcolor=\"#cccccc\" align=\"center\">�޽���</td>";
		echo "<td align=\"center\">
		<input type=\"text\" name=\"msg\" value='".$msg."' size=68></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td bgcolor=\"#cccccc\" align=\"center\">��й�ȣ</td>";
		echo "<td align=\"center\"><input type=\"password\" name=\"npasswd\" size=8></td>\n";
		echo "</tr>\n";

		echo "<tr bgcolor=\"#cccccc\">\n";
		echo "<td colspan=2 align=\"center\"><input type=\"submit\" value=\"�����ϱ�\"></td>\n";
		echo "</tr>\n";

		echo "</table>";
		echo "</form>";
	}
?>