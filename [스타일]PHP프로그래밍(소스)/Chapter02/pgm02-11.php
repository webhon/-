<html>
	<head><title>���α׷� 2-11</title></head>
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
			echo "�й� : $this->studentid, �̸��� �ּ� : $this->email<br>";
			echo "�г� : $this->year, �Ҽ��а� : $this->deptname<br>"; 
		}
		function movingUp()
		{
			$this->year = $this->year + 1;
		}
	}

	$aStudent = new STUDENT("2008-30020","ȫ�浿","kildong@phpschool.ac.kr");
	$aStudent->enroll("�����");
	$aStudent->printInfo();
?>
	</body>
</html>