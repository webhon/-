<?
	include("pgm06-12.inc");

	echo "<h2>����</h2>"; 

	$delno = $_POST["no"];
	$npasswd = md5($_POST["npasswd"]);  
	$nmsg = $_POST["msg"];

	$flag = 0;
	if (file_exists($guestbook)) {
		$lines = file($guestbook);
		$tmpfile = "TMP-".$guestbook;
		$fp = fopen($tmpfile, "w");
		$no = 0;
		foreach($lines as $line) {
			if ($delno == $no) {
				$data = split(":", $line);
				list($name, $msg, $passwd) = $data;
				$passwd = trim($passwd);
				if ( $npasswd == $passwd ) {
					$upline = array($name, $nmsg, $passwd);
					$line = join(":", $upline);
					$line .= "\r\n";
					fputs($fp, $line);
				}
				else {
					$flag = 1;		// ��й�ȣ�� ��ġ���� ����.
					fputs($fp, $line);
				}
			}
			else {
				fputs($fp, $line);
			}
			$no++;
		}
		fclose($fp);
		copy($tmpfile, $guestbook);
		unlink($tmpfile);

		if ($flag) echo "<p>��й�ȣ�� ��ġ���� �ʽ��ϴ�.";
		else echo "<p> ���ŵǾ����ϴ�. ";
	}

	echo "<meta http-equiv=\"refresh\" content=\"2;url=ex06-05.php\">";

?>