<?
	class EMERGENCY {
		var $name, $dept, $telno, $nextp;

		function EMERGENCY($n, $d, $t) {
			$this->name = $n;
			$this->dept = $d;
			$this->telno = $t;
		}

		function getNextPerson() {
			GLOBAL $list;
			echo "<br><hr><br>\n";
			echo "���� ��ü�� �̸� : $this->name<br>";
			$flag = 0;
			foreach ($list as $node) {
				if ($this->nextp == $node->telno) {
					echo "�̸�: $node->name &nbsp; &nbsp;\n";
					echo "�Ҽ�: $node->dept &nbsp; &nbsp;\n";
					echo "��ȭ��ȣ: $node->telno<br>\n";
					$flag = 1;
					break;
				}
			}
			if (!$flag) echo "���� ����� �����ϴ�.<br>";
		}

		function setNextPerson($telno) {
			$this->nextp = $telno;
		}
	} 
	$list[0] = new EMERGENCY("ȫ�浿", "�����", "702-0123");
	$list[1] = new EMERGENCY("�̸���", "���б���", "712-1234");
	$list[2] = new EMERGENCY("������", "��ǻ�ͱ���","725-2345");
	$list[3] = new EMERGENCY("��ȫ��", "��ǻ�ͱ���","746-3456");
	$list[4] = new EMERGENCY("�念��", "���б���", "757-4567");

	$list[1]->setNextPerson($list[4]->telno);
	$list[2]->setNextPerson($list[3]->telno);

	foreach ($list as $node) $node->getNextPerson();

?>