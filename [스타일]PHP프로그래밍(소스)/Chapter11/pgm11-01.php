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
			echo "�����ȣ : $this->courseno<br>";
			echo "�����̸� : $this->coursename<br>";
			echo "��米�� : $this->profname<br>";
			echo "�����а� : $this->deptname<br>";
			echo "���� : $this->credit<br>";
		}
	}
?>