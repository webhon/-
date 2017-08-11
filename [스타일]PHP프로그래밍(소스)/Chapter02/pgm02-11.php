<html>
	<head><title>프로그램 2-11</title></head>
	<body>
<?
	class STUDENT {
		var $studentid, $studentname, $email, $year, $deptname;

		function STUDENT($id, $name, $email) {
			$this->studentid = $id;
			$this->studentname = $name;
			$this->email = $email;
		}
		function enroll($dname) {
			$this->year = 1;
			$this->deptname = $dname;
		}
		function printInfo() {
			echo "<b>[ $this->studentname ]</b><br>";
			echo "학번 : $this->studentid, 이메일 주소 : $this->email<br>";
			echo "학년 : $this->year, 소속학과 : $this->deptname<br>"; 
		}
		function movingUp()
		{
			$this->year = $this->year + 1;
		}
	}

	$aStudent = new STUDENT("2008-30020","홍길동","kildong@phpschool.ac.kr");
	$aStudent->enroll("국어교육");
	$aStudent->printInfo();
?>
	</body>
</html>