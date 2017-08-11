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
?>