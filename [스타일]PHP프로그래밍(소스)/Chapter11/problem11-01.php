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
			echo "현재 객체의 이름 : $this->name<br>";
			$flag = 0;
			foreach ($list as $node) {
				if ($this->nextp == $node->telno) {
					echo "이름: $node->name &nbsp; &nbsp;\n";
					echo "소속: $node->dept &nbsp; &nbsp;\n";
					echo "전화번호: $node->telno<br>\n";
					$flag = 1;
					break;
				}
			}
			if (!$flag) echo "다음 사람은 없습니다.<br>";
		}

		function setNextPerson($telno) {
			$this->nextp = $telno;
		}
	} 
	$list[0] = new EMERGENCY("홍길동", "국어교육", "702-0123");
	$list[1] = new EMERGENCY("이몽룡", "수학교육", "712-1234");
	$list[2] = new EMERGENCY("성춘향", "컴퓨터교육","725-2345");
	$list[3] = new EMERGENCY("김홍도", "컴퓨터교육","746-3456");
	$list[4] = new EMERGENCY("장영실", "수학교육", "757-4567");

	$list[1]->setNextPerson($list[4]->telno);
	$list[2]->setNextPerson($list[3]->telno);

	foreach ($list as $node) $node->getNextPerson();

?>