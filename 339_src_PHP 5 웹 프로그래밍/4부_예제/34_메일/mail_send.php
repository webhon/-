<?
$receiver; $subject; $content;
$content=str_replace("\n","<br>",$content);

// ������ ��� �̸��� "CodMedia"�̸�
$sender_name = "CodMedia";
// ������ ����� ���� �ּҴ� ��webmaster@codmedia.com���̸�
$sender_address = "webmaster@codmedia.com";
// ���� �޽��� ������ html Ÿ������ �ۼ��Ǿ��ٰ� �����ڿ��� �˷��ݴϴ�.
$body_format = "text/html;charset=EUC-KR";

$re=mail(
		"$receiver",
		"$subject",
		"$content",
		"From: [".$sender_name."] <".$sender_address.">\n".
		"Content-Type: ".$body_format."\n"
		);

echo "���� ���� �Ϸ�\n<p>";
echo "<a href='./mail_form.php'>�ڷ�</a>";
?>
