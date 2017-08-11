<?
	class Course {
	var $courseno, $coursename, $profname, $credit;

		function Course($no, $cname, $dname, $credit) {
			$this->courseno = $no;
			$this->coursename = $cname;
			$this->deptname = $dname;
			$this->credit = $credit;
		}
		function teach($pname) {
			$this->profname = $pname;
		}
		function print_info() {
			echo "과목번호 : $this->courseno<br>";
			echo "과목이름 : $this->coursename<br>";
			echo "담당교수 : $this->profname<br>";
			echo "개설학과 : $this->deptname<br>";
			echo "학점 : $this->credit<br>";
		}
	}

	$c1 = new Course("CS020", "웹프로그래밍", "컴퓨터교육", 3);
	$c1->teach("신윤복");
	$c1->print_info();
?>